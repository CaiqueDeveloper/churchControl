<?php

namespace App\Http\Livewire\Categories;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
class ListCategory extends Component
{
    use WithPagination;
    public User $user;
    
    protected $listeners  = [

        'category::index::created' => '$refresh',
        'category::deleted' => '$refresh',
        'category::updated' => '$refresh',
    ];
    public function mount(): void
    {
        $this->user = Auth::user();
    }
    public function render(): View
    {
        
        return view('livewire.categories.list-category',
            [
                'categories' => $this->user->church->categories()->paginate(10),
            ]
        );
    }
}
