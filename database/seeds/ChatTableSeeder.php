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
            'chat_room_id' =>1,
            'message' =>'阿部くん久しぶり。私は同窓会行こうと思ってるけど来る？',
            'send_user_id' =>1
        ]);
        $chat->save();
        
    }
}
