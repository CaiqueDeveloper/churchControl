<?php

namespace App\Http\Livewire\Categories;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
class ListCategory extends Component
{
    use WithPagination;
    
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
