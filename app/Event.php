<?php

namespace App;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'outline',
    'date',
    'place',
    'cost',
    'time_limit',
    'others',
    'user_id',
    'invitation_status'
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
    
    public function invited_users()
    {
        return $this->belongsToMany('App\User',
            'event_invitations','event_id','invited_user');
    }
    
    public function registered_users()
    {
        return $this->hasMany('App\Member','event_id');
    }
    
    public function chat_rooms()
    {
        return $this->hasMany('App\ChatRoom','event_id');
    }
    
    public function participate_users()
    {
        $participate_users = $this->invited_users()
            ->where('paticipation_status', 1);
        return $participate_users;
    }
    
    
}
