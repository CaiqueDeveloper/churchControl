<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateCategory extends Component
{
    public $canShowModal = false;
    public Category $category;
   

    protected $rules = [
        'category.name' => 'required|min:3|max:100',
        'category.church_id' => 'required',
        'category.enabled' => 'boolean',
    ];
    public function render()
    {

        return view(
            'livewire.categories.update-category',
            [
                'churchs' => Auth::user()->with('churchs')->get(),
            ]
        );
    }

    public function update(){
        $this->validate();
        $this->category->save();
        $this->canShowModal = false;
        $this->emitTo(ListCategory::class, 'category::updated');
    }
}
