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


    public function userorder()
    {   
        // 一对一 这个是关联用户表     第二个参数是 用户的id  第三个参数是跟user表关联的用户uid
        return $this->hasOne('App\Models\Users','id','uid');
    }

    public function useraddres()
    {   
        
        return $this->hasOne('App\Models\Address','id','aid');
    }
}
