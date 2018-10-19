<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    //
    public function userdata(){
        return $this->belongsTo('App\User');
    }

}
