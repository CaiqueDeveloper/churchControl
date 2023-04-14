<?php

namespace App\Classes;

use App\Models\Transaction;
use DateInterval;
use DatePeriod;
use DateTime;

class ProcessingTransaction
{

    protected array $data = [];

    public function __construct($payload)
    {   
        
        $this->data =  $this->validateFields($payload);
        $this->run($this->data);
    }

    private function run($data)
    {   
        
        if ($data['is_recurrent'] && $data['total_recurrent'] > 0) {
           
            return $this->processingTransactionRecurrent($data);
        } else {

            return $this->processingTransactionNoRecurrent($data);
        }
    }
    private function processingTransactionRecurrent($data)
    {
        
        $transactions = $this->mountedArrayTransaction($data);
        return Transaction::insert($transactions);
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
    private function processingTransactionNoRecurrent($data)
    {

        return Transaction::create($data);
    }

    
}
