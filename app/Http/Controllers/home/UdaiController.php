<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users; 
use App\Models\Goodsgo;
use App\Models\Goods;
use App\Models\Userinfo; 
use App\Models\Integrals; 

use DB;
class UdaiController extends Controller
{
    //
    public function integral()
    {	
    	// 用户id
    		
    	 $id =(Session('home_user')['id']);
    	$user = Users::find($id);
    	$goodsgo = Goodsgo::all();
         $integ = DB::select('select * from integrals where uid = ?', [$id]);
    	return view('home.udai.udai_integral',['user'=>$user,'goods'=>$goodsgo ,'integ'=>$integ]);
    }
    public function convert($id)
    {   
        //用户id
        $uid =(Session('home_user')['id']);
       $usersinfo = DB::select('select * from user_info where uid = ?', [$uid]);
        //用户积分
        $desc = $usersinfo[0]->desc; 
        //用户积分表的id
        $infoid = $usersinfo[0]->id;
         $goods= Goodsgo::find($id);
         //商品积分
        $price=$goods->price;
        //购买后的积分
        $remain = $desc-$price;
        //查询地址是否存在
          $addres = DB::select('select * from address where uid = ?', [$uid]);
        if($addres){
             $adid =0;
                 foreach($addres as $k=>$v){
                       if($v->status ==1){
                             $adid = $v->id;
                       }
                    }
            if($adid){

                //购买后的积分
                $remain = $desc-$price;
                //购买后的库存
                $num = $goods->goodsNum-1;
                //修改商品库存
                 $goods->goodsNum = $num;
                 $res = $goods->save();
                  //修改用户积分
                  $info = Userinfo::find($infoid);
                  $info->desc = $remain;
                  $res2 = $info->save();
                            if($res && $res2){
                                     $integral = new Integrals;
                                     $integral->uid = $uid ;
                                     $integral->gid = $id;
                                     $integral->price = $price;
                                     $integral->aid = $adid;
                                     $integral->oid = date('Ymdhis').rand(1000,9999);
                                     $integral->save();
                                     return '<script>alert("兑换成功");location.href="/home/integral";</script>';  
                                }else {
                                    return '<script>alert("兑换失败");location.href="/home/integral";</script>';
                                      }
                    }else {
                         return '<script>alert("请选择地址");location.href="/home/addres";</script>';
                    }

            }else {
               return '<script>alert("请添加地址");location.href="/home/addres";</script>'; 
            }


      
    }
}
