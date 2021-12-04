<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Category;
class ProductControl extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount_of_cod',
        'digital_partial',
        'digital_discount',
        'payment_method',
        'cod_discount',
        'online_discount'
    ];
    
    public function category(){
        
        return $this->belongsTo(Category::class);
    }
}
