<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $fillable = [
    'title',
    'outline',
    'body',
    'user_id'
    ];
    
    public function admins()
    {
        return $this->belongsToMany('App\User','administrators','event_id','user_id');
    }
    
    public function adminCheck()
    {
        return $this->admins->contains(auth()->user());
    }
    
    public function creatorCheck()
    {
        $user_id = Auth::id();
        return $this->user_id == $user_id;
    }
}
