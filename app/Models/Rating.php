<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    Protected $guarded = [];

    public function customer(){
        // return $this->belongsTo(Customer::class, 'customer_id');
        return $this->belongsTo(Customer::class, 'customer_id');
        
    }
}
