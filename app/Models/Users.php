<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    public function info()
    {
        return $this->hasMany('App\Models\Userinfo','uid');
    }

}
