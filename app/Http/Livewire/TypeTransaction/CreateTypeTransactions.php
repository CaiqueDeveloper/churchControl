<?php

namespace App\Http\Livewire\TypeTransaction;

use App\Models\TypeTransaction;
use Livewire\Component;

class CreateTypeTransactions extends Component
{
    public $name = '';
    public TypeTransaction $type;

    protected $rules = [
        'name' => 'required|min:3|unique:type_transactions',
    ];

    public function render()
    {
        return view('livewire.type-transaction.create-type-transactions');
    }
    
    public function save(){

        $this->validate();
    
        TypeTransaction::create(['name' => $this->name]);
        $this->name = '';
        $this->emitTo(ListTypeTransactions::class, 'typeTransaction::created');
    }
}
