<?php

use Illuminate\Database\Seeder;

class EventInvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event_invitation = new \App\EventInvitation([
            'event_id' => 1,
            'inviting_user' => 1,
            'invited_user' => 1,
            'invitation_status' =>1 ,
            ]);
        $event_invitation->save();  
        $event_invitation = new \App\EventInvitation([
            'event_id' => 2,
            'inviting_user' => 2,
            'invited_user' => 2,
            'invitation_status' =>1 ,
            ]);
        $event_invitation->save(); 
        $event_invitation = new \App\EventInvitation([
            'event_id' => 3,
            'inviting_user' => 2,
            'invited_user' => 2,
            'invitation_status' =>1 ,
            ]);
        $event_invitation->save(); 
        $event_invitation = new \App\EventInvitation([
            'event_id' => 2,
            'inviting_user' => 2,
            'invited_user' => 1
            ]);
        $event_invitation->save();  
        $event_invitation = new \App\EventInvitation([
            'event_id' => 3,
            'inviting_user' => 2,
            'invited_user' => 1
            ]);
        $event_invitation->save();  
    }
}
