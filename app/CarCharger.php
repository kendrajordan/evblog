<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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
    public function user(){
      return $this->belongsTo('\App\User');
    }
    public function car(){
      return $this->belongsTo('\App\Car');
    }
    public function charger(){
      return $this->belongsTo('\App\Charger');
    }
  protected $dateFormat = 'm-d-YTH:i:s';
}
