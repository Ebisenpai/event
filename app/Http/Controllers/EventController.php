<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Event $event)
    {
        return view('index')->with(['events' => $event->get()]);
    }
    public function show(Event $event)
    {
        return view('show')->with(['event' =>$event]);
    }
}
?>
