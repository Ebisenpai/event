<?php

namespace App;

use App\Event;
use App\Member;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    //ユーザーがadminのイベント情報を持ってくる
    public function admin_events()
    {
        return $this->belongsToMany('App\Event','administrators','user_id','event_id');
    }
    
    public function created_events()
    {
        return $this->hasMany(Event::class);
    }
    
    //イベント招待テーブルの招待先が自分かつ招待ステータスが0のイベントを表示する
    public function invited_events()
    {
        return $this->belongsToMany('App\Event','event_invitations','invited_user','event_id')->wherePivot('invitation_status', 0);
    }
    
    //イベント招待テーブルの招待先が自分かつ招待ステータスが1のイベントを表示する
    public function joined_events()
    {
        return $this->belongsToMany('App\Event','event_invitations','invited_user','event_id')->wherePivot('invitation_status', 1);
    }
    
    function IdentityProviders()
    {
        // IdentityProviderモデルと紐付ける 1対多の関係
        return $this->hasMany(IdentityProvider::class);
    }
    
    public function check_member()
    {
        $user_name = Auth::user()->name;
        $member_name = Member::where('name', $user_name)->first();
        return isset($member_name);
    }
    
    
}
