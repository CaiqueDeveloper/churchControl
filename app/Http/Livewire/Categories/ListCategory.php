<?php

namespace App\Http\Livewire\Categories;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListCategory extends Component
{
    protected $listeners  = [

        'category::created' => '$refresh',
        'category::deleted' => '$refresh',
        'category::updated' => '$refresh',
    ];

    public function render()
    {
        
        return view('livewire.categories.list-category',
            [
                'user' => Auth::user()->with('churchs.categories')->get(),
            ]
        );
    }
}
