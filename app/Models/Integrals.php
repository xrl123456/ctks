<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Integrals extends Model
{
    //
     public $table = 'integrals';
      public function user()
    {
        return $this->belongsTo('App\Models\Users','uid');
    }
     public function goods()
    {
        return $this->belongsTo('App\Models\Goodsgo','gid');
    }

     public function address()
    {
        return $this->belongsTo('App\Models\Address','aid');
    }


}
