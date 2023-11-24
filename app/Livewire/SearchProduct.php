<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Collection;

class SearchProduct extends Component
{
    public $query;
    public $search_results;
    public $paginate;

    public function mount()
    {
        $this->query = '';
        $this->paginate = 5;
        $this->search_results = Collection::empty();
    }

    public function render()
    {
        return view('livewire.search-product');
    }

    public function updatedQuery()
    {
        $this->search_results = Product::where('product_name', 'like', '%' . $this->query . '%')
            ->orWhere('product_code', 'like', '%' . $this->query . '%')
            ->take($this->paginate)->get();
    }

    public function loadMore()
    {
        $this->paginate += 5;
        $this->updatedQuery();
    }

    public function resetQuery()
    {
        $this->query = '';
        $this->paginate = 5;
        $this->search_results = Collection::empty();
    }

    public function selectProduct($product)
    {
        $this->dispatch('productSelected', $product);
    }
}
