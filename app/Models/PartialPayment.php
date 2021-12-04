<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartialPayment extends Model
{
    use HasFactory;
    protected $fillable = ['parcentage', 'amount','remaining'];
    
    public function order(){
        return $this-> hasOne(Order::class);
    }
}
