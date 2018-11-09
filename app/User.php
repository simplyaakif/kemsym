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

    public function userdata(){
        return $this->hasOne('App\UserData');
    }

    public function userorder()
    {
        return $this->hasMany('App\Orders');
    }
    
    public function usersubs()
    {
        return $this->hasMany('App\Subscriptions');
    }

}
