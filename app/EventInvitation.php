<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventInvitation extends Model
{
    protected $fillable = [
    'event_id',
    'inviting_user',
    'invited_user',
    'event_id',
    ];
}
