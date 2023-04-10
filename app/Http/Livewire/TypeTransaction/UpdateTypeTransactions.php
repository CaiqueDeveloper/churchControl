<?php

namespace App\Http\Livewire\TypeTransaction;

use App\Models\TypeTransaction;
use Livewire\Component;

class UpdateTypeTransactions extends Component
{
    public  $canShowModal = false;
    public  TypeTransaction $type;
    
    protected $rules = [
        'type.name' => 'required|min:3',
    ];
    public function render()
    {
        return view('livewire.type-transaction.update-type-transactions');
    }
    public function update(){

        $this->validate();
        $this->type->save();
        $this->canShowModal = false;
        $this->emitTo(ListTypeTransactions::class, 'typeTransaction::updated');
    }
}
