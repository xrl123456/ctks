<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    //视频控制器
    public function index()
    {
    	$video = Video::all();
    	return view('home.video.class_room',['video'=>$video]);
    }
}
