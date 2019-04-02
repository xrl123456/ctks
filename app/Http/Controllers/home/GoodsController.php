<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodsgo;
use App\Models\Collect;
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
			
			// 判断收藏表有没有
			$collect = Collect::where('uid','=',$uid)->where('gid',$itemShow)->get();
		
			session(['shopcart' => $number]);
			return view('home.udai.item_show',['itemShow'=>$itemShow,'collect'=>$collect]);

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
