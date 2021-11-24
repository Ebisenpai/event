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
        $user = new \App\User([
            'name' =>'山田花子',
            'email' =>'satsukiabe0328@gmail.com',
            'password'=>Hash::make('abesatsu328')
        ]);
        $user->save();
        
        $user = new \App\User([
            'name' =>'あべさつき',
            'email' =>'satuki328glk@yahoo.co.jp',
            'password'=>Hash::make('abesatsu328')
        ]);
        $user->save();
        
        $user = new \App\User([
            'name' =>'アベサツキ',
            'email' =>'s-abe-2e6@eagle.sophia.ac.jp',
            'password'=>Hash::make('abesatsu328')
        ]);
        $user->save();
        
        $user = new \App\User([
            'name' =>'山田太郎',
            'email' =>'satsukiabe03281999@outlook.jp',
            'password'=>Hash::make('abesatsu328')
        ]);
        $user->save();
        
        $user = new \App\User([
            'name' =>'室賀大輝',
            'email' =>'yamada@yahoo.co.jp',
            'password'=>Hash::make('abesatsu328')
        ]);
        $user->save();
        
        $user = new \App\User([
            'name' =>'安倍太郎',
            'email' =>'abe@yahoo.co.jp',
            'password'=>Hash::make('abesatsu328')
        ]);
        $user->save();
    }
}
