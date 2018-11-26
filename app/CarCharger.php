<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarCharger extends Model
{
    //
    protected $table = 'car_charger';
    protected $fillable =[
      'car_id',
      'charger_id',
      'start',
      'end'
    ];
  protected $dateFormat = 'm-d-YTH:i:s';
}
