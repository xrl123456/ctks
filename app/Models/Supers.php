<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supers extends Model
{
    //
    public $table ="supers";

    public function superlist ()
    {
 		return $this->belongsTo('App\Models\Super_info','id');

    }

    
}


