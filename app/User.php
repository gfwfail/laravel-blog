<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function getAvatarAttribute($value)
    {
        if (!$value){
            return 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $this->email ) ) ).'?s=30';
        } else {
            return '/'.$value;
        }
    }

    public function posts()
    {
        return $this->hasMany(\App\Post::class);
    }

    public function notifications()
    {
        return $this->hasMany(\App\Notification::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }
}
