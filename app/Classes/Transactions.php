<?php

namespace App\Classes;

use App\Models\Transaction;
use App\Models\User;
use DateInterval;
use DatePeriod;
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

        $payload = Transaction::with('category', 'typeTransaction', 'createdBy', 'updatedBy')
            ->where('church_id', $this->user->church_id)
            ->whereBetween('payment_date', [$start, $end])
            ->get();

        return $this->mountedData($payload);
    }
    private function mountedData($payload)
    {

        $this->transactions = [];
        foreach ($payload as $p) {

            $this->transactions[] = [
                'transaction_id' => $p->id,
                'name' => $p->name,
                'typeTransaction' => $p->typeTransaction->name,
                'category' => $p->category->name,
                'value' => 'R$ ' . number_format($p->value, 2, ',', '.',),
                'is_recurrent' => $p->is_recurrent ? 'Yes' : 'NO',
                'total_recurrent' => '(' . $p->total_recurrent . ')',
                'payment_date' => (new DateTime($p->payment_date))->format('d/m/Y'),
                'pay' => $p->pay ? 'Yes' : 'NO',
                'state' => $p->enabled,
                'created_by' => $p->createdBy->name,
                'updated_by' =>  $p->updatedBy =  $p->updatedBy != null ? $p->createdBy->name : 'AGUARDANDO ATUALIZAÇÃO',
                'created_at' => (new DateTime($p->created_at))->format('d/m/Y'),
                'updated_at' => (new DateTime($p->updated_at))->format('d/m/Y'),
            ];
        }
        return $this->transactions;
    }
    public function processingTransaction($payload)
    {

        $valid = $this->validateFields($payload);

        if ($valid['is_recurrent'] && $valid['total_recurrent'] > 0) {

            return $this->user->church->transactions()->insert($this->mountedArrayTransaction($valid));
        } else {

            return $this->user->church->transactions()->create($valid);
        }
    }
    private function mountedArrayTransaction($payload)
    {
        $payment_day = new DateTime($payload['payment_date']);
        $start    = (new DateTime($payment_day->format('Y-m-d')));
        $end      = (new DateTime($payment_day->format('Y-m-d')))->modify('+' . $payload['total_recurrent'] . 'month');
        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start->modify('+1 month'), $interval, $end->modify('+1 month'));
        $now = new DateTime();


        $data = [];
        $i = 0;
        foreach ($period as $key => $per) {
            $i++;
            $data[] = [
                'name' => $payload['name'],
                'church_id' => $payload['church_id'],
                'category_id' => $payload['category_id'],
                'typeTransaction_id' => $payload['typeTransaction_id'],
                'created_by' => $payload['created_by'],
                'value' => (float)$payload['value'] / $payload['total_recurrent'],
                'is_recurrent' => $payload['is_recurrent'],
                'total_recurrent' => $i . '/' . $payload['total_recurrent'],
                'payment_date' => $per->format('Y-m-' . $payment_day->format('d')),
                'pay' => $payload['pay'],
                'updated_at' => $now->format('Y-m-d H:i:s'),
                'created_at' => $now->format('Y-m-d H:i:s'),
            ];
        }
        return $data;
    }
    private function validateFields($payload)
    {

        $payload['is_recurrent'] =  $payload['is_recurrent'] != null ? true : false;
        $payload['pay'] = $payload['pay'] != null ? true : false;
        $payload['total_recurrent'] = $payload['total_recurrent'] != null ? $payload['total_recurrent'] : 0;

        return $payload;
    }
}
