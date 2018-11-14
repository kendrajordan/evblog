<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge_session extends Model
{
    //
    public function user() {
     return $this->belongsTo('\App\User');
 }
 public function cost() {
   return $this->belongsTo('\App\Cost');
}
}
