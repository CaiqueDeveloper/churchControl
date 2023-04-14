<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;

    public function categories(){
        
        return $this->hasMany(Category::class,'church_id');
    }
    public function transactions(){

        return $this->hasMany(Transaction::class, 'church_id');
    }
}
