<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'selectedCategory' => 'categoryChanged',
        'showCount'        => 'showCountChanged'
    ];

    public $categories;
    public $category_id;
    public $limit = 9;

    public function mount($categories)
    {
        $this->categories = $categories;
        $this->category_id = '';
    }

    public function render()
    {
        return view('livewire.product-list', [
            'products' => User::when($this->category_id, function ($query) {
                return $query->where('category_id', $this->category_id);
            })
                ->paginate($this->limit)
        ]);
    }

    public function categoryChanged($category_id)
    {
        $this->category_id = $category_id;
        $this->resetPage();
    }

    public function showCountChanged($value)
    {
        $this->limit = $value;
        $this->resetPage();
    }

    public function selectProduct($product)
    {
        $this->dispatch('productSelected', $product);
    }
}
