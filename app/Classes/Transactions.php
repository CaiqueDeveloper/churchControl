<?php

namespace App\Classes;

use App\Models\Transaction;
use App\Models\User;
use DateTime;

class Transactions
{

    protected array $transactions;
    protected object $user;

    public function __construct(User $user)
    {

        $this->user = $user;

        return $this->getTransactions();
    }
    public  function getTransactions()
    {

        $start = '2023-043-01';
        $end = '2023-06-30';
        
        $transactions = Transaction::with('category', 'typeTransaction', 'createdBy', 'updatedBy')
            ->where('church_id', $this->user->church_id)
            ->whereBetween('payment_date', [$start, $end])
            ->get();
        
        return $this->mountedData($transactions);
    }
    private function mountedData($transactions){

        $this->transactions = [];
        foreach($transactions as $key_t => $transaction){

            $this->transactions[] = [
                'transaction_id' => $transaction->id,
                'name' => $transaction->name,
                'value' => 'R$ '.number_format($transaction->value, 2,',','.', ),
                'is_recurrent' => $transaction->is_recurrent ? 'Yes': 'NO',
                'total_recurrent' => '('.$transaction->total_recurrent.')',
                'payment_date' => (new DateTime($transaction->payment_date))->format('d/m/Y'),
                'pay' => $transaction->pay ? 'Yes': 'NO',
                'state' => $transaction->enabled,
                'created_by' => $transaction->createdBy->name,
                'updated_by' =>  $transaction->updatedBy =  $transaction->updatedBy != null ? $transaction->createdBy->name: 'AGUARDANDO ATUALIZAÇÃO',
                'created_at' => (new DateTime($transaction->created_at))->format('d/m/Y'),
                'updated_at' =>  (new DateTime($transaction->updated_at))->format('d/m/Y'),
            ];
        }
        return $this->transactions;
    }
}
