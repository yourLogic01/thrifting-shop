<?php

namespace App\Livewire;

use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductCart extends Component
{
    public $listeners = ['productSelected'];

    public $cart_instance;
    public $global_discount;
    public $discount;
    public $quantity;
    public $check_quantity;
    public $discount_type;
    public $item_discount;
    public $unit_price;
    public $data;

    private $product;

    public function mount($cartInstance, $data = null)
    {
        $this->cart_instance = $cartInstance;

        if ($data) {
            $this->data = $data;
            $this->global_discount = $data->discount;

            $this->updatedGlobalDiscount();

            $cart_items = User::instance($this->cart_instance)->content();

            foreach ($cart_items as $cart_item) {
                $this->check_quantity[$cart_item->id] = [$cart_item->options->stock];
                $this->quantity[$cart_item->id] = $cart_item->qty;
                $this->unit_price[$cart_item->id] = $cart_item->price;
                $this->discount_type[$cart_item->id] = $cart_item->options->product_discount_type;
                $this->item_discount[$cart_item->id] = round(100 * ($cart_item->discount / $cart_item->price));
            }
        } else {
            $this->discount = 0;
            $this->check_quantity = [];
            $this->quantity = [];
            $this->unit_price = [];
            $this->discount_type = [];
            $this->item_discount = [];
        }
    }

    public function render()
    {
        $cart_items = Cart::instance($this->cart_instance)->content();

        return view('livewire.product-cart', [
            'cart_items' => $cart_items
        ]);
    }

    public function productSelected($product)
    {
        $cart = Cart::instance($this->cart_instance);

        $exists = $cart->search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id == $product['id'];
        });

        if ($exists->isNotEmpty()) {
            session()->flash('message', 'Product exists in the cart!');
            return;
        }

        $this->product = $product;

        $cart->add([
            'id'      => $product['id'],
            'name'    => $product['product_name'],
            'qty'     => 1,
            'price'   => $this->calculate($product)['price'],
            'weight'  => 1,
            'options' => [
                'product_discount'      => 0,
                'product_discount_type' => 'percentage',
                'sub_total'             => $this->calculate($product)['sub_total'],
                'code'                  => $product['product_code'],
                'stock'                 => $product['qty'],
                'unit'                  => 'pcs',
                // 'product_tax'           => 0.00,
                'unit_price'            => $this->calculate($product)['price']
            ]
        ]);

        $this->check_quantity[$product['id']] = $product['qty'];
        $this->quantity[$product['id']] = 1;
        $this->discount_type[$product['id']] = 'percentage';
        $this->item_discount[$product['id']] = 0;
    }

    public function removeItem($row_id)
    {
        Cart::instance($this->cart_instance)->remove($row_id);
    }

    public function updatedGlobalDiscount()
    {
        Cart::instance($this->cart_instance)->setGlobalDiscount((int)$this->global_discount);
    }

    public function updateQuantity($row_id, $product_id)
    {
        if ($this->cart_instance == 'sale') {
            if ($this->check_quantity[$product_id] < $this->quantity[$product_id]) {
                session()->flash('message', 'The requested quantity is not available in stock.');
                return;
            }
        }

        Cart::instance($this->cart_instance)->update($row_id, $this->quantity[$product_id]);

        $cart_item = Cart::instance($this->cart_instance)->get($row_id);

        Cart::instance($this->cart_instance)->update($row_id, [
            'options' => [
                'sub_total'             => $cart_item->price * $cart_item->qty,
                'code'                  => $cart_item->options->code,
                'stock'                 => $cart_item->options->stock,
                'unit'                  => $cart_item->options->unit,
                // 'product_tax'           => $cart_item->options->product_tax,
                'unit_price'            => $cart_item->options->unit_price,
                'product_discount'      => $cart_item->options->product_discount,
                'product_discount_type' => $cart_item->options->product_discount_type,
            ]
        ]);
    }

    // public function updatedDiscountType($value, $name)
    // {
    //     $this->item_discount[$name] = 0;
    // }

    // public function discountModalRefresh($product_id, $row_id)
    // {
    //     $this->updateQuantity($row_id, $product_id);
    // }

    // public function setProductDiscount($row_id, $product_id)
    // {
    //     $cart_item = User::instance($this->cart_instance)->get($row_id);

    //     $discount_amount = ($cart_item->price + $cart_item->options->product_discount) * ($this->item_discount[$product_id] / 100);

    //     User::instance($this->cart_instance)
    //         ->update($row_id, [
    //             'price' => ($cart_item->price + $cart_item->options->product_discount) - $discount_amount
    //         ]);

    //     $this->updateCartOptions($row_id, $product_id, $cart_item, $discount_amount);
    //     session()->flash('discount_message' . $product_id, 'Discount added to the product!');
    // }

    public function updatePrice($row_id, $product_id)
    {
        $product = Cart::findOrFail($product_id);

        $cart_item = Cart::instance($this->cart_instance)->get($row_id);

        Cart::instance($this->cart_instance)->update($row_id, ['price' => $this->unit_price[$product['id']]]);

        Cart::instance($this->cart_instance)->update($row_id, [
            'options' => [
                'sub_total'             => $this->calculate($product, $this->unit_price[$product['id']])['sub_total'],
                'code'                  => $cart_item->options->code,
                'stock'                 => $cart_item->options->stock,
                'unit'                  => $cart_item->options->unit,
                // 'product_tax'           => $cart_item->options->product_tax,
                'unit_price'            => $this->calculate($product, $this->unitprice[$product['id']])['price'],
                'product_discount'      => $cart_item->options->product_discount,
                'product_discount_type' => $cart_item->options->product_discount_type,
            ]
        ]);
    }

    public function calculate($product, $new_price = null)
    {
        if ($new_price) {
            $product_price = $new_price;
        } else {
            $this->unit_price[$product['id']] = $product['price'];
            $product_price = $this->unit_price[$product['id']];
        }

        $price = 0;
        $unit_price = 0;
        $sub_total = 0;

        $price = $product_price;
        $unit_price = $product_price;
        $sub_total = $product_price;

        return ['price' => $price, 'unit_price' => $unit_price, 'sub_total' => $sub_total];
    }

    public function updateCartOptions($row_id, $product_id, $cart_item, $discount)
    {
        Cart::instance($this->cart_instance)->update($row_id, ['options' => [
            'sub_total'             => $cart_item->price * $cart_item->qty,
            'code'                  => $cart_item->options->code,
            'stock'                 => $cart_item->options->stock,
            'unit'                  => $cart_item->options->unit,
            // 'product_tax'           => $cart_item->options->product_tax,
            'unit_price'            => $cart_item->options->unit_price,
            'product_discount'      => $discount,
            'product_discount_type' => $this->discount_type[$product_id],
        ]]);
    }
}
