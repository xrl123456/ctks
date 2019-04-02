<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Collect;
use App\Models\Goodsgo;
use DB;

class CollectController extends Controller
{
    //
    
    public function index()
    {	
    	$uid = session('home_user')['id'];
    	$collects = Collect::where('uid',$uid)->get();
    	// dd($collects);
    	return view('home.usershow.collect',['collects'=>$collects]);

    }

    public function add($id)
    {
    	
    	// 获取到了商品的id
        // 在获取到用户的id 
        $uid = session('home_user')['id'];
        $new = DB::table('collects')->where('uid',$uid)->where('gid',$id)->get();
        if(count($new) == 1) {
        	return 3; 
        }

        $collect = new Collect;
        $collect->uid = $uid;
        $collect->gid = $id;
        $res = $collect->save();

        if($res){
        	return 1;

        }else{
        	return 2;
        }

    }

    public function del($id)
    {
    	// echo $id;
    	DB::beginTransaction();
    	$res = Collect::destroy($id);
    	if($res){
            DB::commit();
            return '<script>alert("已取消");location.href="/home/collect/index"</script>';

        }else{
            DB::rollBack();
            return '<script>alert("错误，请稍后尝试");location.href="/home/collect/index"</script>';

        }
    }
}
