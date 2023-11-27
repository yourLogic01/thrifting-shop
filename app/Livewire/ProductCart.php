<?php

namespace App\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class ProductCart extends Component
{
    public $listeners = ['productSelected'];

    public $cart_instance;
    public $quantity;
    public $check_quantity;
    public $unit_price;
    public $data;

    public $product;

    public function mount($cartInstance, $data = null)
    {
        $this->cart_instance = $cartInstance;

        if ($data) {
            $this->data = $data;

            $cart_items = Cart::instance($this->cart_instance)->content();

            foreach ($cart_items as $cart_item) {
                $this->check_quantity[$cart_item->id] = [$cart_item->options->stock];
                $this->quantity[$cart_item->id] = $cart_item->qty;
                $this->unit_price[$cart_item->id] = $cart_item->price;
            }
        } else {
            $this->check_quantity = [];
            $this->quantity = [];
            $this->unit_price = [];
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
                'sub_total'             => $this->calculate($product)['sub_total'],
                'code'                  => $product['product_code'],
                'stock'                 => $product['product_quantity'],
                'unit'                  => $product['product_unit'],
                'unit_price'            => $this->calculate($product)['unit_price']
            ]
        ]);

        $this->check_quantity[$product['id']] = $product['product_quantity'];
        $this->quantity[$product['id']] = 1;
    }

    public function removeItem($row_id)
    {
        Cart::instance($this->cart_instance)->remove($row_id);
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
                'unit_price'            => $cart_item->options->unit_price,
            ]
        ]);
    }

    public function updatePrice($row_id, $product_id)
    {
        $product = Product::findOrFail($product_id);

        $cart_item = Cart::instance($this->cart_instance)->get($row_id);

        Cart::instance($this->cart_instance)->update($row_id, ['price' => $this->unit_price[$product['id']]]);

        Cart::instance($this->cart_instance)->update($row_id, [
            'options' => [
                'sub_total'             => $this->calculate($product, $this->unit_price[$product['id']])['sub_total'],
                'code'                  => $cart_item->options->code,
                'stock'                 => $cart_item->options->stock,
                'unit'                  => $cart_item->options->unit,
                'unit_price'            => $this->calculate($product, $this->unit_price[$product['id']])['unit_price'],
            ]
        ]);
    }

    public function calculate($product, $new_price = null)
    {
        if ($new_price) {
            $product_price = $new_price;
        } else {
            $this->unit_price[$product['id']] = $product['product_price'];
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

    public function updateCartOptions($row_id, $cart_item)
    {
        Cart::instance($this->cart_instance)->update($row_id, ['options' => [
            'sub_total'             => $cart_item->price * $cart_item->qty,
            'code'                  => $cart_item->options->code,
            'stock'                 => $cart_item->options->stock,
            'unit'                  => $cart_item->options->unit,
            'unit_price'            => $cart_item->options->unit_price,
        ]]);
    }
}
