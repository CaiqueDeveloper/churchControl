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

    public function category(){

        return $this->hasOne(Category::class, 'id','category_id');
    }
    public function typeTransaction(){

        return $this->hasOne(TypeTransaction::class, 'id','typeTransaction_id');
    }
    public function createdBy(){

        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function updatedBy(){

        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
