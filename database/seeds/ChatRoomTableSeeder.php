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
            'event_id' =>'1',
            'user1_id' =>'1',
            'user2_id' =>'2'
        ]);
        $chat_room->save();
        
        $chat_room = new \App\ChatRoom([
            'event_id' =>'1',
            'user1_id' =>'1',
            'user2_id' =>'3'
        ]);
        $chat_room->save();
        
        $chat_room = new \App\ChatRoom([
            'event_id' =>'1',
            'user1_id' =>'1',
            'user2_id' =>'4'
        ]);
        $chat_room->save();
        
        $chat_room = new \App\ChatRoom([
            'event_id' =>'1',
            'user1_id' =>'1',
            'user2_id' =>'5'
        ]);
        $chat_room->save();
        
        $chat_room = new \App\ChatRoom([
            'event_id' =>'1',
            'user1_id' =>'1',
            'user2_id' =>'6'
        ]);
        $chat_room->save();
        
        $chat_room = new \App\ChatRoom([
            'event_id' =>'3',
            'user1_id' =>'6',
            'user2_id' =>'1'
        ]);
        $chat_room->save();
        
        $chat_room = new \App\ChatRoom([
            'event_id' =>'3',
            'user1_id' =>'6',
            'user2_id' =>'2'
        ]);
        $chat_room->save();
        
        $chat_room = new \App\ChatRoom([
            'event_id' =>'3',
            'user1_id' =>'6',
            'user2_id' =>'3'
        ]);
        $chat_room->save();
        
        $chat_room = new \App\ChatRoom([
            'event_id' =>'3',
            'user1_id' =>'6',
            'user2_id' =>'4'
        ]);
        $chat_room->save();
        
        $chat_room = new \App\ChatRoom([
            'event_id' =>'3',
            'user1_id' =>'6',
            'user2_id' =>'5'
        ]);    
    }
}
