<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodsgo;
use DB;

class GoodsController extends Controller
{
    //
    	//商品详情页
		public function itemShow($id)
		{
			// 查询对应的商品 
			$itemShow = Goodsgo::find($id);
			$uid = (session('home_user')['id']);
			$shopnum = DB::table('orders')->where('uid',$uid)->where('status','0')->get();
			$number = (count($shopnum));
			session(['shopcart' => $number]);
			return view('home.udai.item_show',['itemShow'=>$itemShow]);

		}	
		//商品加入购物车
		// public function shopcart($id)
		// {
		// 	   $itemShow = Goodsgo::find($id);
		// 	    $itemShow->num =1;
			   
		// 	   session(['num'=>$itemShow->num]);
		// 	   // dd(session('num'));
			     
		// 	 return view('home.udai.item_show',['itemShow'=>$itemShow]);
		// }
}
