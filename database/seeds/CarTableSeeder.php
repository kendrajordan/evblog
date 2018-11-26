<?php

use Illuminate\Database\Seeder;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $janine= \App\User::where('name','Janine')->first();
        $car_charger=\App\Charger::where('name','Kentucky Utility')->first();
          $car1 = new \App\Car;
          $car1->user_id = $janine->id;
          $car1->carName ='2013 Nissan Leaf';
          $car1->battery_capacity = 30;
          $car1->charge_rate = 3.3;
          $car1->save();
          
    }
}
