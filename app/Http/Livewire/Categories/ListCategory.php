<?php

namespace App\Http\Livewire\Categories;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListCategory extends Component
{
    public function render()
    {
        
        return view('livewire.categories.list-category', [
            [
                'categories' => Auth::user()->with('churchs.categories')->get(),
            ]
        ]);
    }
}
