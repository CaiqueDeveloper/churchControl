<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DeleteCategory extends Component
{
    public Category $category;
    public bool $canShowModal = false;

    public function __construct()
    {
        $this->category = new Category();
    }
    public function render(): View
    {
        return view('livewire.categories.delete-category');
    }

    public function delete(): void
    {

        $this->category->delete();
        $this->reset();
        $this->emitTo(ListCategory::class, 'category::deleted');
    }
}
