<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\City;
use App\Models\AreaZone;

class AreaCost extends Model
{
    use HasFactory;
    protected $fillable=['area_id', 'cost'];
    
    public function city(){
        return $this->belongsto(City::class, 'area_id', 'id');
    }
    public function areaZone(){
        return $this->hasMany(AreaZone::class, 'id', 'area_id');
    }
}
