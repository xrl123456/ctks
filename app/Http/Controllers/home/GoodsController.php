<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodsgo;
use App\Models\Goods;
use DB;

class GoodsController extends Controller
{
    //
    	//商品详情页
		public function itemShow($id)
		{
			// 查询对应的商品 
			$itemShow = Goodsgo::find($id);
			$itemShow->shopnum = 1;
			session(['goodsshow'=>$itemShow]);
			// dd(session('goodsshow'));
			$uid = (session('home_user')['id']);

			// 购物车显示数据
			$shopnum = DB::table('orders')->where('uid',$uid)->where('status','0')->get();
			$number = (count($shopnum));
			
			session(['shopcart' => $number]);
			return view('home.udai.item_show',['itemShow'=>$itemShow]);

		}	
		// //商品加入购物车

		// public function shopcart($id)
		// {
			 
		// }

		// public function categoryl($id)
		// {
			
  //     	  $goods = Goodsgo::all();
		// 	return view('home.udai.item_category',['id'=>$id,'goods'=>$goods]);
		// }

}
