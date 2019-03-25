<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lbts;
use DB;

class LbtsController extends Controller
{
    //
    //
    public static function index()
    {
    	//$lbt=new Lbts;
    	$lbt=DB::select("select * from lbts where(status=1) order by id desc limit 5 ");
    	//dump($lbt);
    	return $lbt;
    }
}
