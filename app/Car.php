<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    public function user(){
      return $this->belongsTo('\App\User');
    }
    public function charger(){
      return $this->belongsToMany('\App\Charger')->withPivot('start','end');
    }
}
