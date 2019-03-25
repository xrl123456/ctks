<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bbs;

class BbsController extends Controller
{
	public static function Bbs()
	{
    $yiji_date=Bbs::all();
    //dd($yiji_date);
    return $yiji_date;
	}
	public function index($id)
	{
		//return 111;
		//echo '123';
		$data=Bbs::find($id);

		
		 return view('home/bbs/udai_notice',['id'=>$id,'data'=>$data]);
	}
}
