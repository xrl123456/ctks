<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodsgo;
use App\Models\Orders;
use App\Models\Order_info;
use App\Models\Address;
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
        // 购物车首页  获取当前session中的用户 订单表中 状态为0 (未付款的数据) 排序 重最新的开始显示
        // 获取地址表 
        // 用户id
        $uid = (session('home_user')['id']);
        //订单数据库
        $total = new Orders;
        
        // 通过用户id 和 是否已付款 查询所有
        
        $testshop = $total->where('uid','=',$uid)->where('status','=','0')->get();
        // dd($testshop);
        return view('home.cart.shopcart',['testshop'=>$testshop]);
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
        // echo '1';
            DB::beginTransaction();
        //$num商品数量
        //$id 商品id
        //$uid  用户id 
        // 获得 商品的id和购买的数量  根据相关联的字段 查出所有数据 放进订单表中 
        // 用户id  $uid/ session(突然获取不到 ) 
        // 商品id（）  +数量  
        // 获取商品的单价和 统计总金额 
        $goods = Goodsgo::find($id);
        // 总价
        $oprice = $goods->price * $num;
         // 添加数据进数据库
        $order = new Orders;
        //关联数据库// 接受返回id 添加进订单详情表
        $info = new Order_info;
        // $gid=$order->where('gid',$id)->get();
        // if($gid[0]->gid && $gid[0]->status==0 && $gid[0]->uid==$uid){
            
        //              $orid= $gid[0]->id;
        //          //总价格
        //         $total= $gid[0]->oprice + $oprice;

        //         //总数量
        //         $number= $gid[0]->number + $num;
        //         // //订单号
        //         $oid=date('Ymdhis').rand(1000,9999);
        //         //修改数据库
        //         $users = $order->where('id',$orid)->update(['oprice' => $total,'number'=>$number,'oid'=>$oid]);
        //         //修改时间
        //         $otime=date('Y-m-d h-i-s');
        //         //关联数据库插入值
        //         $res2 = $info->where('gid',$id)->update(['oid' => $oid,'otime'=>$otime]);
        //         //获取数据
        //         $shopnum = DB::table('orders')->where('uid',$uid)->where('status','0')->get();
        //         //获取总数据
        //         $number = (count($shopnum));
        //         if($users && $res2) {
        //                    DB::commit();
        //                     echo  $number;
        //                 }else{
        //                     DB::rollBack();
        //                     return '0';
        //                 }
        // }else{
                // 添加数据进数据库
             $order = new Orders;
                // 商品id
                $order->gid = $id;
                // 订单号
                $order->oid = $oid = date('Ymdhis').rand(1000,9999);
                // 总价
                $order->oprice = $oprice;
                // 数量
                $order->number = $num;
                // 用户id
                $order->uid = $uid;
                // 添加
                $res = $order->save();  
                
                // 订单号
                $info->oid = $oid;
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

        // }

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
