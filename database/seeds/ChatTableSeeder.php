<?php

use Illuminate\Database\Seeder;

class ChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chat = new \App\Chat([
            'chat_room_id' =>'1',
            'message' =>'こんにちは',
            'send_user_id' =>'1'
        ]);
        $chat->save();
        
        $chat = new \App\Chat([
            'chat_room_id' =>'1',
            'message' =>'どうも',
            'send_user_id' =>'2'
        ]);
        $chat->save();
        
        $chat = new \App\Chat([
            'chat_room_id' =>'2',
            'message' =>'よろしく',
            'send_user_id' =>'1'
        ]);
        $chat->save();
        
        $chat = new \App\Chat([
            'chat_room_id' =>'3',
            'message' =>'こんにちは',
            'send_user_id' =>'1'
        ]);
        $chat->save();
        
        $chat = new \App\Chat([
            'chat_room_id' =>'4',
            'message' =>'こんにちは',
            'send_user_id' =>'1'
        ]);
        $chat->save();
        
        $chat = new \App\Chat([
            'chat_room_id' =>'5',
            'message' =>'こんにちは',
            'send_user_id' =>'1'
        ]);
        $chat->save();
        
        $chat = new \App\Chat([
            'chat_room_id' =>'6',
            'message' =>'久しぶり',
            'send_user_id' =>'6'
        ]);
        $chat->save();
        
        $chat = new \App\Chat([
            'chat_room_id' =>'6',
            'message' =>'元気にしてる？',
            'send_user_id' =>'1'
        ]);
        $chat->save();
        
        $chat = new \App\Chat([
            'chat_room_id' =>'7',
            'message' =>'こんにちは',
            'send_user_id' =>'2'
        ]);
        $chat->save();
        
        $chat = new \App\Chat([
            'chat_room_id' =>'8',
            'message' =>'こんにちは',
            'send_user_id' =>'3'
        ]);
        $chat->save();
        
        $chat = new \App\Chat([
            'chat_room_id' =>'9',
            'message' =>'こんにちは',
            'send_user_id' =>'4'
        ]);
        $chat->save();
        
    }
}
