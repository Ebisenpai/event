<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member = new \App\Member([
            'event_id' => 1,
            'name' => '山田花子',
            'user_id' => 1,
        ]);
        $member->save();    
        $member = new \App\Member([
            'event_id' => 2,
            'name' => 'あべさつき',
            'user_id' => 2,
        ]);
        $member->save();  
        $member = new \App\Member([
            'event_id' => 3,
            'name' => '山田花子',
            'user_id' => 1,
        ]);
        $member->save();  
        $member = new \App\Member([
            'event_id' => 1,
            'name' => 'あべさつき',
            'user_id' => 2,
        ]);
        $member->save(); 
        $member = new \App\Member([
            'event_id' => 3,
            'name' => 'あべさつき',
            'user_id' => 2,
        ]);
        $member->save(); 
        
    }
}
