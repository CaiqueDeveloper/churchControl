<?php

namespace App\Http\Livewire\Transaction;

use App\Classes\Transactions;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ListTransaction extends Component
{   
    use WithPagination;
    public User $user;
    
    protected $listeners = [
        'transaction:::index:created'=> '$refresh',
        'transaction:::index:deleted'=> '$refresh',
        'transaction:::index:updated'=> '$refresh',
    ];
    public function __construct()
    {
        $this->user = Auth::user();
    }
    public function render(): View
    {
        return view('livewire.transaction.list-transaction', 
            [
                'transactions' => $this->getAllTransaction(),
            ]
        );
    }

    public function getAllTransaction(): object
    {

        return (new Transactions(Auth::user()))->getTransactions();
    }
}
