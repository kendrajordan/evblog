<?php

use Illuminate\Database\Seeder;

class CostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $janine=  \App\User::where('name','Janine')->first();
            $cost1= new \App\Cost;
            $cost1->user_id =$janine->id;
            $cost1->energy_charge = 0.15;
            $cost1->DSM = .000235;
            $cost1->save();

    }
}
