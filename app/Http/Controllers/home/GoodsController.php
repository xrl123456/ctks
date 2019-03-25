<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodsgo;
use App\Models\Goods;

class GoodsController extends Controller
{
    //
    	//商品详情页
		public function itemShow($id)
		{
			 $itemShow = Goodsgo::find($id);
			 // dd($itemShow);
			return view('home.udai.item_show',['itemShow'=>$itemShow]);

		}	
		//商品加入购物车
		public function shopcart($id)
		{
			 
		}

		public function categoryl($id)
		{
			
      	  $goods = Goodsgo::all();
			return view('home.udai.item_category',['id'=>$id,'goods'=>$goods]);
		}
}
