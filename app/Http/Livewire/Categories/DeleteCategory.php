<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class DeleteCategory extends Component
{
    public $canShowModal = false;
    public Category $category;

    public function render()
    {
        return view('livewire.categories.delete-category');
    }

    public function delete(){

        $this->category->delete();
        $this->canShowModal = false;
        $this->emitTo(ListCategory::class, 'category::deleted');
    }
}
