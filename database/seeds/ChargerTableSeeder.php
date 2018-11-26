<?php

use Illuminate\Database\Seeder;

class ChargerTableSeeder extends Seeder
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
          $charger1 = new \App\Charger;
          $charger1->user_id = $janine->id;
          $charger1->per_kwh = false;
          $charger1->cost = 3.28;
          $charger1->charge_rate = 6.6;
          $charger1->name = 'Kentucky Utility';
          $charger1->save();
    }
}
