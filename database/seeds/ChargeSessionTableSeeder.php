<?php

use Illuminate\Database\Seeder;

class ChargeSessionTableSeeder extends Seeder
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
            $cost1= \App\Cost::where('energy_charge',0.15)->first();
            $charge1= new \App\Charge_session;
            $charge1->user_id =$janine->id;
            $charge1->cost_id =$cost1->id;
            $charge1->date = '2018-11-14';
            $charge1->start = 5.67;
            $charge1->end = 18.5;
            $charge1->save();

    }
}
