<?php

namespace App\Http\Livewire\Transaction;

use App\Classes\ProcessingTransaction;
use App\Models\Transaction;
use App\Models\TypeTransaction;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateTransaction extends Component
{
    public $canShowModal = false;
    public $church_id;
    public $typeTransaction_id;
    public $category_id;
    public $created_by;
    public $name;
    public $value;
    public $is_recurrent;
    public $total_recurrent;
    public $payment_date;
    public $pay;
    public $typeTransaction;
    public $categories;
    
    protected $rules = [

        'church_id' => 'required',
        'category_id' => 'required',
        'typeTransaction_id' => 'required',
        'created_by' => 'required',
        'name' => 'required|min:3|max:150',
        'value' => 'required',
        'is_recurrent' => 'nullable',
        'total_recurrent' => 'nullable',
        'payment_date' => 'required|date',
        'pay' => 'nullable',
    ];
    public function mount(){

        $user = Auth::user()->with('churchs.categories')->get();
        
        $this->created_by  = Auth::user()->id;
        $this->church_id  = Auth::user()->church_id;
        $this->typeTransaction  = TypeTransaction::get();
        $this->categories  = $user[0]->churchs[0]->categories()->where('enabled', true)->get();
    }
    public function render()
    {
        return view('livewire.transaction.create-transaction');
    }

    public function create(){

        $validate = $this->validate();
        $this->emitTo(ListTransaction::class, 'transaction::created');
        (new ProcessingTransaction($validate));
        //reset fields form
        $this->name = '';
        $this->church_id = '';
        $this->category_id = '';
        $this->typeTransaction_id = '';
        $this->value = '';
        $this->is_recurrent = '';
        $this->total_recurrent = '';
        $this->payment_date = '';
        $this->pay = '';
        //closed modal
        $this->canShowModal = false;
        //emit event 
    }
}
