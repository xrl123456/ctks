<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Bbs extends Model
{
    //
    public $table="bbs";
   public function bbsdesc()
    {
    	return $this->belongsTo('App\Models\Bbsfen','cates');
    }
}
