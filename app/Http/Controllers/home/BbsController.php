<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bbs;
use App\Models\Orders;
use App\Models\Goodsgo;
use App\Models\Order_info;
use DB;
use Hash;
use App\Models\Users;
class BbsController extends Controller
{
	public static function Bbs()
	{
    $yiji_date=Bbs::all();
    return $yiji_date;
	}

	public function index($id)
	{
		$data=Bbs::find($id);
		 return view('home/bbs/udai_notice',['id'=>$id,'data'=>$data]);
	}
	 
	//测试
	public function aaa()
	{	
		

	}
}
 