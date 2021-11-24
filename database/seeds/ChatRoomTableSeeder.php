<?php

use Illuminate\Database\Seeder;

class ChatRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chat_room = new \App\ChatRoom([
            'event_id' =>1,
            'first_user_id' =>1,
            'member_id' =>2
        ]);
        $chat_room->save();
        
          
    }
}
