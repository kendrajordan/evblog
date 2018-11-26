<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driving_habit extends Model
{
    //
    public function users(){
      return $this belongsTo('\App\User');
    }
}
