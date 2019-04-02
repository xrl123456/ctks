<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bbs;
use App\Models\Orders;
use App\Models\Goodsgo;
use App\Models\Order_info;
use DB;
class BbsController extends Controller
{
	public static function Bbs()
	{
    
    $yiji_date=DB::select("select * from bbs where(status=1) ");
    	//dump($lbt);
    return $yiji_date;
	}
	public function index($id)
	{
		
		//echo '123';
		$data=Bbs::find($id);
		 return view('home/bbs/udai_notice',['id'=>$id,'data'=>$data]);
	}
	public function aaa()
	{	
	

	}
}
 