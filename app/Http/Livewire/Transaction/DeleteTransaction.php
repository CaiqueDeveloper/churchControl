<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;

class DeleteTransaction extends Component
{
    //public Transaction $transaction;

    public function render()
    {
        return view('livewire.transaction.delete-transaction');
    }
}
