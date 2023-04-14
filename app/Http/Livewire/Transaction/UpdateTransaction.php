<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Transaction;
use App\Models\TypeTransaction;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateTransaction extends Component
{
    
    public User $user;
    public $transaction;
    public object $categories;
    public object $typeTransaction;
    public bool $canShowModal = false;

    protected $rules = [

        'transaction.category_id' => 'required',
        'transaction.typeTransaction_id' => 'required',
        'transaction.name' => 'required|min:3|max:150',
        'transaction.value' => 'required',
        'transaction.is_recurrent' => 'nullable',
        'transaction.total_recurrent' => 'nullable',
        'transaction.payment_date' => 'required|date',
        'transaction.pay' => 'nullable',
        'transaction.enabled' => 'nullable',
    ];
    public function __construct()
    {
        $this->transaction = new Transaction();
        $this->user = Auth::user();
        $this->categories = $this->user->church->categories()->where('enabled', true)->get();
        $this->typeTransaction = TypeTransaction::get();

    }
    public function render(): View
    {
        return view('livewire.transaction.update-transaction');
    }

    public function update(): void
    {
        $this->validate();
        $this->transaction->save();
        $this->reset();
        $this->emitTo(ListTransaction::class, 'transaction:::index:updated');
    }
}
