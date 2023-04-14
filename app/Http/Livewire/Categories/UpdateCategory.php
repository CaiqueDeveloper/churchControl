<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateCategory extends Component
{
    public Category $category;
    public bool $canShowModal = false;
   

    protected $rules = [
        'category.name' => 'required|min:3|max:100',
        'category.church_id' => 'required',
        'category.enabled' => 'boolean',
    ];

    public function __construct()
    {
        $this->category = new Category();
    }

    public function render(): View
    {

        return view(
            'livewire.categories.update-category',
            [
                'churchs' => Auth::user()->with('churchs')->get(),
            ]
        );
    }

    public function update(): void{
        
        $this->validate();
        $this->category->save();
        $this->reset();
        $this->emitTo(ListCategory::class, 'category::updated');
    }
}
