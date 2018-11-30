<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Car extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //
    public function user(){
      return $this->belongsTo('\App\User');
    }
    public function charger(){
      return $this->belongsToMany('\App\Charger')->withPivot('start','end');
    }
    public function car_charger(){
      return $this->hasMany('\App\CarCharger');
    }

}
