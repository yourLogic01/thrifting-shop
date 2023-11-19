<?php

namespace App\Livewire;

use Livewire\Component;

class Filter extends Component
{
    public $categories;
    public $category;
    public $showCount;

    public function mount($categories)
    {
        $this->categories = $categories;
    }

    public function render()
    {
        return view('livewire.filter');
    }

    public function updatedCategory()
    {
        $this->dispatch('selectedCategory', $this->category);
    }

    public function updatedShowCount()
    {
        $this->dispatch('showCount', $this->category);
    }
}
