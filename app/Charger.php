<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charger extends Model
{
    //
  public function user(){
    return $this->belongsTo('\App\User');
  }
  public function cars(){
      return $this->belongsToMany('\App\Car')->withPivot('start','end');

    }
}
