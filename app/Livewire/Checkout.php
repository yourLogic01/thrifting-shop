<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Checkout extends Component
{
    public $listeners = ['productSelected'];

    public $cart_instance;
    public $quantity;
    public $check_quantity;
    public $data;
    public $total_amount;

    public function mount($cartInstance)
    {
        $this->cart_instance = $cartInstance;
        $this->check_quantity = [];
        $this->quantity = [];
        $this->total_amount = 0;
    }

    public function hydrate()
    {
        $this->total_amount = $this->calculateTotal();
    }

    public function render()
    {
        $cart_items = Cart::instance($this->cart_instance)->content();

        return view('livewire.checkout', [
            'cart_items' => $cart_items
        ]);
    }

    public function proceed()
    {
        $this->dispatch('showCheckoutModal');
    }

    public function calculateTotal()
    {
        return Cart::instance($this->cart_instance)->total();
    }

    public function resetCart()
    {
        Cart::instance($this->cart_instance)->destroy();
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
        $this->total_amount = $this->calculateTotal();
    }

    public function removeItem($row_id)
    {
        Cart::instance($this->cart_instance)->remove($row_id);
    }

    public function updateQuantity($row_id, $product_id)
    {
        if ($this->check_quantity[$product_id] < $this->quantity[$product_id]) {
            session()->flash('message', 'The requested quantity is not available in stock.');
            return;
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

    public function calculate($product)
    {
        $price = 0;
        $unit_price = 0;
        $sub_total = 0;

        $price = $product['product_price'];
        $unit_price = $product['product_price'];
        $sub_total = $product['product_price'];

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
