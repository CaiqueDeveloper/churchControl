<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DeleteTransaction extends Component
{
    public Transaction $transaction;
    public bool $canShowModal = false;

    public function render(): View
    {
        return view('livewire.transaction.delete-transaction');
    }

    public function delete():void
    {
        $this->transaction->delete();
        $this->emitTo(ListTransaction::class, 'transaction:::index:deleted');
    }
}
