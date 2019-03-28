<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Links;
use DB;


class LinksController extends Controller
{
    public static function index()
    {
    	//$lbt=new Lbts;
    	$links=DB::select("select * from links order by id desc limit 5 ");
    	//dump($lbt);
    	return $links;
    }
}
