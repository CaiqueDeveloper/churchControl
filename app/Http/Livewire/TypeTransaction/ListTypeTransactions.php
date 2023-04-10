<?php

namespace App\Http\Livewire\TypeTransaction;

use App\Models\TypeTransaction;
use Livewire\Component;


class ListTypeTransactions extends Component
{
    protected $listeners  = [

        'typeTransaction::created' => '$refresh',
        'typeTransaction::deleted' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.type-transaction.list-type-transactions',
        [
            'types' => TypeTransaction::query()->paginate(10)
        ]
        );
    }
}
