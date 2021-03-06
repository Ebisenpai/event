<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            EventTableSeeder::class,
            AdministratorSeeder::class,
            EventInvitationSeeder::class,
            MemberSeeder::class,
            ChatRoomTableSeeder::class,
            ChatTableSeeder::class
        ]);
    }
}
