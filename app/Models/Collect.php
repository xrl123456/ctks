<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    //
    public function usercollect()
    {   
        // 一对一 这个是关联用户表     第二个参数是 用户的id  第三个参数是跟user表关联的用户uid
        return $this->hasOne('App\Models\Goodsgo','id','gid');
    }
}
