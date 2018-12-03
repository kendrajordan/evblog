<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\DateTime;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarCharger extends Model
{
  use SoftDeletes;
    //
    protected $table = 'car_charger';
    protected $fillable =[
      'car_id',
      'charger_id',
      'start',
      'end',
      'vehicle_battery_capacity',
      'vehicle_charge_rate',
      'charger_charge_rate',
      'flat_rate',
      'fee1',
      'fee2',
      'fee_time',
      'fee1_kwh',
      'options',
      'feeoption'
    ];
    public function trimDate(){
      $dt = new Carbon($this->start);
      return $dt->format('m-d-Y');
    }
    //Will use this for my cost function
    public function approximateTime(){
      $endtime =new Carbon($this->end);
      $starttime=new Carbon($this->start);
      $min = $endtime->diffInMinutes($starttime);
      $time= $min/60;
      return $time;
    }
    public function duration(){
      $endtime =new Carbon($this->end);
      $starttime=new Carbon($this->start);
      $min = $endtime->diffInMinutes($starttime);
      $time= $min/60;
      $hour=$endtime->diffInHours($starttime);
      $remainder=($time - $hour)*60;
      $duration=$hour.'hours and '.$remainder.'minutes';
      return $duration;
    }
    public function time(){
      $dt = new \DateTime($this->start);
      return $dt->format('Y-m-d\TH:i');
    }
    public function timeEnd(){
      $dt = new \DateTime($this->end);
      return $dt->format('Y-m-d\TH:i');
    }
    public function user(){
      return $this->belongsTo('\App\User');
    }
    public function car(){
      return $this->belongsTo('\App\Car')->withTrashed();
    }
    public function charger(){
      return $this->belongsTo('\App\Charger')->withTrashed();
    }




}
