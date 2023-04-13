<?php

namespace App\Http\Livewire\Transaction;

use App\Classes\Transactions;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListTransaction extends Component
{
    protected $listeners = [
        'transaction::created'=> '$refresh',
    ];
    public function render()
    {
        return view('livewire.transaction.list-transaction', 
            [
                'transactions' => $this->getAllTransaction(),
            ]
        );
    }

    public function getAllTransaction(){

        return (new Transactions(Auth::user()))->getTransactions();
    }
}
