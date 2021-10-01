<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','send_user_id')->first();
    }
    
    public function user_name()
    {
        return $this->user()->name;
    }
}
