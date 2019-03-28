<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Webs;
class WebsController extends Controller
{
    public static function index()
    {
    	//$lbt=new Lbts;
    	$webs=DB::select("select * from webs where(statu=1) order by id desc limit 1 ");
    	//dump($lbt);
    	return $webs;
    }
}
