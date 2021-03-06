<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Brand extends Model
{
    protected $fillable = ['brand_cod', 'brand_cod_amount', 'brand_partial', 'brand_discount'];
  protected $with = ['brand_translations'];

  public function getTranslation($field = '', $lang = false){
      $lang = $lang == false ? App::getLocale() : $lang;
      $brand_translation = $this->brand_translations->where('lang', $lang)->first();
      return $brand_translation != null ? $brand_translation->$field : $this->$field;
  }

  public function brand_translations(){
    return $this->hasMany(BrandTranslation::class);
  }

}
