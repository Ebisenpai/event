<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\Administrator([
            'event_id' =>1,
            'user_id' =>1
        ]);
        $administrator->save();
        
        $administrator = new \App\Administrator([
            'event_id' =>2,
            'user_id' =>2
        ]);
        $administrator->save();
        
        $administrator = new \App\Administrator([
            'event_id' =>3,
            'user_id' =>1
        ]);
        $administrator->save();    
    }
}
