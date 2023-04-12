<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateCategory extends Component
{
    public $canShowModal = false;
    public $name;
    public $church_id;

    protected $rules = [
        'name' => 'required|min:3|max:100',
        'church_id' => 'required',
    ];

    public function render()
    {
        return view('livewire.categories.create-category',
            [
                'churchs' => Auth::user()->with('churchs')->get(),
            ]
        );
    }

    public function create(){

        $validatedData = $this->validate();
        Category::create($validatedData);
        $this->name = '';
        $this->church_id = '';
        $this->emitTo(ListCategory::class,  'category::created');
        $this->canShowModal = false;
    }
}
