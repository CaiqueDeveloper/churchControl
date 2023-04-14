<?php

namespace App\Http\Livewire\Transaction;

use App\Classes\Transactions;
use App\Models\TypeTransaction;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateTransaction extends Component
{
    public User $user;
    public object $categories;
    public object $typeTransaction;
    public bool $canShowModal = false;

    public ?int $typeTransaction_id = null;
    public ?int $created_by = null;
    public ?int $church_id = null;
    public ?int $category_id = null;
    public ?string $name = null;
    public ?float $value = null;
    public ?bool $is_recurrent = null;
    public ?int $total_recurrent = null;
    public ?string $payment_date = null;
    public ?bool $pay = null;
    
    protected $rules = [

        'category_id' => 'required',
        'created_by' => 'nullable',
        'church_id' => 'nullable',
        'typeTransaction_id' => 'required',
        'name' => 'required|min:3|max:150',
        'value' => 'required',
        'is_recurrent' => 'nullable',
        'total_recurrent' => 'nullable',
        'payment_date' => 'required|date',
        'pay' => 'nullable',
    ];
    public function __construct()
    {
        $this->user = Auth::user();
        $this->created_by = $this->user->id;
        $this->church_id = $this->user->church_id;
        $this->categories = $this->user->church->categories()->where('enabled', true)->get();
        $this->typeTransaction = TypeTransaction::get();

    }
    public function render(): View
    {
        return view('livewire.transaction.create-transaction');
    }

    public function create():void
    {
        $valid = $this->validate();
        (new Transactions(Auth::user()))->processingTransaction($valid);
        $this->reset();
        $this->emitTo(ListTransaction::class, 'transaction:::index:created');
    }
}
