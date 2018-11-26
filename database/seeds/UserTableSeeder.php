<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            $janine= new \App\User;
            $janine-> name = 'Janine';
            $janine->email = str_random(10).'@gmail.com';
            $janine->password = bcrypt('secret');
            $janine->save();
    }
}
