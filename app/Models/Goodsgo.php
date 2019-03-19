<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goodsgo extends Model
{
    //商品列表
    public $table = 'goods_go';

    public function goodtype()
    {
    	return $this->belongsTo('App\Models\Goods','tid');
    }
    
}
	