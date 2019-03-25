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
			
			 //获取一级分类
        $yiji_data = Goods::where('pid',0)->get();
       		 //通过一级分类 获取二级分类
      	foreach($yiji_data as $key => $value) {
      	 	//获取当前一级分类下的所有二级分类
      	 	$erji_data = Goods::where('pid',$value->id)->get();
      	 	$value['sub'] = $erji_data;
      	 	//通过二级分类获取分类ID 获取三级分类
      	 	foreach($value['sub'] as $kk=>$vv){
      	 		$sanji_data = Goods::where('pid',$id)->get();
      	 		$vv['sub']=$sanji_data;
      	 		
      	 	}
      	 }
      	  $goods = Goodsgo::all();
     // dd( $sanji_data);
			return view('home.udai.item_category',['data'=>$sanji_data,'goods'=>$goods]);
		}
}
