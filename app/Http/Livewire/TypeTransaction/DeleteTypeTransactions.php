<?php

namespace App\Http\Livewire\TypeTransaction;

use App\Models\TypeTransaction;
use Livewire\Component;

class DeleteTypeTransactions extends Component
{
    public TypeTransaction $type;

    public function render()
    {
        return view('livewire.type-transaction.delete-type-transactions');
    }
    public function delete(){

        $this->type->delete();
        $this->emitTo(ListTypeTransactions::class, 'typeTransaction::deleted');
    }
}
