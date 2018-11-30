<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Charger extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  public function user(){
    return $this->belongsTo('\App\User');
  }
  public function cars(){
      return $this->belongsToMany('\App\Car')->withPivot('start','end');

    }
    public function car_charger(){
      return $this->hasMany('\App\CarCharger');
    }
}
