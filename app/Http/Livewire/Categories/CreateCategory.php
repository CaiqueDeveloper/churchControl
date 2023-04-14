<?php

namespace App\Http\Livewire\Categories;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateCategory extends Component
{
    public User  $user;
    public ?string $name = null;
    public ?int $church_id = null;
    public bool $canShowModal = false;

    protected $rules = [
        'name' => 'required|min:3|max:100',
        'church_id' => 'required',
    ];
    public function __construct()
    {
        $this->user = Auth::user();
        
    }
    
    public function render(): View
    {
        return view(
            'livewire.categories.create-category',
            [
                'churchs' => Auth::user()->with('churchs')->get(),
            ]
        );
    }

    public function create(): void
    {
        $valid = $this->validate();
        $this->user->church->categories()->create($valid);
        $this->reset();
        $this->emitTo(ListCategory::class,  'category::index::created');
    }
}
