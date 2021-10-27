<?php

namespace App\Http\Controllers;

use App\Member;
use App\Event;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function store(Request $request,Member $member, Event $event)
    {
        $input = $request['members'];
        $event_id = $input['event_id'];
        $member->fill($input)->save();
        return redirect('/events/'. $event_id.'/');
    }
}
