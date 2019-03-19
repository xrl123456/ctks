<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supers extends Model
{
    //
    public function superinfo()
    {
        return $this->hasOne('App\Models\Super_info','sid');
    }

}
