<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users; 
use App\Models\Goodsgo;
use App\Models\Goods;
class UdaiController extends Controller
{
    //
    public function integral()
    {	
    	// 用户id
    		
    	 $id =(Session('home_user')['id']);
    	$user = Users::find($id);
    	$goodsgo = Goodsgo::all();
    	return view('home.udai.udai_integral',['user'=>$user,'goods'=>$goodsgo]);
    }
}
