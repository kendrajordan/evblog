<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function driving_habit(){
      return $this->hasOne('\App\Driving_habit');
    }
    public function chargers(){
      return $this->hasMany('\App\Charger');
    }
    public function car_chargers(){
      return $this->hasMany('\App\Charger');
    }
    public function cars(){
      return $this->hasMany('\App\Car');
    }

}
