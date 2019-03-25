<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodsgo;
use App\Models\Orders;
use App\Models\Order_info;
use DB;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // echo 1;
        // return $id;

    }

    public function shopping($id,$num,$uid)
    {
            DB::beginTransaction();
        // 获得 商品的id和购买的数量  根据相关联的字段 查出所有数据 放进订单表中 
        // 用户id  $uid/ session(突然获取不到 ) 
        // 商品id（）  +数量  
        // 获取商品的单价和 统计总金额 
        
        $goods = Goodsgo::find($id);
        // 总价
        $oprice = $goods->price * $num;
        // dump(session('home_user'));
        // dd($uid = Session::get('home_user')['id']);

        // 添加数据进数据库
        $order = new Orders;
        // 订单号
        $order->oid = date('Ymdhis').rand(1000,9999);
        // 总价
        $order->oprice = $oprice;
        // 数量
        $order->number = $num;
        // 用户id
        $order->uid = $uid;
        // 添加
        $res = $order->save();  
        // 接受返回id 添加进订单详情表
        $oid = $order->id;
        
        $info = new Order_info;
        // 订单号
        $info->oid = $order->oid;
        // 商品的id
        $info->gid = $id;
        // 时间
        $info->otime = date('Y-m-d h-i-s');
        $res1 = $info->save();  
        
        $shopnum = DB::table('orders')->where('uid',$uid)->where('status','0')->get();
        
        $number = (count($shopnum));
        // dd($number);
        if($res && $res1) {
              DB::commit();
              return $number;
        }else{
            
              DB::rollBack();
                return $number;

        }


    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
