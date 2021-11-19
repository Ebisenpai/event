<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new \App\User([
            'title' = '○○高校　△△期　同窓会',
            'outline' =,
            'date' =,
            'place' =,
            'cost' =,
            'time_limit' =,
            'others' =,
            'user_id'=
            ]);
        $event->save();
        
        $event = new \App\User([
            'title' = ,
            'outline' =,
            'date' =,
            'place' =,
            'cost' =,
            'time_limit' =,
            'others' =,
            'user_id'=
            ]);
        $event->save();
        
        $event = new \App\User([
            'title' = ,
            'outline' =,
            'date' =,
            'place' =,
            'cost' =,
            'time_limit' =,
            'others' =,
            'user_id'=
            ]);
        $event->save();
                
    }
}
