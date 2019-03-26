<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $primaryKey = 'oid';
    
	public function addersand()
    
    {   
       return $this->belongsToMany('App\Models\Goodsgo','order_info','oid','gid');
    }
}
