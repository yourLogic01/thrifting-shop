<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;

class SearchProduct extends Component
{
    public $query;
    public $search_results;
    public $how_many;

    public function mount()
    {
        $this->query = '';
        $this->how_many = 5;
        $this->search_results = Collection::empty();
    }

    public function render()
    {
        return view('livewire.search-product');
    }

    // TODO: Query search
    public function updatedQuery(): void
    {
        // $this->search_results = Product::where('product_name', 'like', '%' . $this->query . '%')
        //     ->orWhere('product_code', 'like', '%' . $this->query . '%')
        //     ->take($this->how_many)->get();
        return;
    }

    public function loadMore()
    {
        $this->how_many += 5;
        $this->updatedQuery();
    }

    public function resetQuery()
    {
        $this->query = '';
        $this->how_many = 5;
        $this->search_results = Collection::empty();
    }

    public function selectProduct($product)
    {
        $this->dispatch('productSelected', $product);
    }
}
