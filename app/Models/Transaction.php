<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'church_id','category_id','typeTransaction_id','created_by','name','value','is_recurrent','total_recurrent','payment_date','pay',
    ];
}
