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
        $uid = (session('home_user')['id']);
        $addres = DB::table('address')->where('uid',$uid)->get();
       
        $total = new Orders;
        $testshop = $total->where('uid','=',$uid)->where('status','=','0')->get();
        // dd($testshop);
        return view('home.cart.shopcart',['addres'=>$addres,'testshop'=>$testshop]);
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
        // 接受购物车去结算的页面 
        $demo = $request->except(['_token']);
        // 用户id
        $uid = (session('home_user')['id']);
         // $uid = (session('home_user')['id']);
        $addres = DB::table('address')->where('uid',$uid)->where('status','<','2')->get();

 
        foreach($demo as $key=>$value){
            // 这是订单的id(不是主键) 主键是oid  status =0
            // dump($key);
            $total = new Orders;
            $testshop[] = $total->where('id','=',$key)->where('status','=','0')->get();
            
            // dump($testshop);        
            // 记得操作数据回滚

        }
        $money = 0;
        foreach($testshop as $key =>$value){
            // dump($key);
            // dump($value);
            foreach($value as $k =>$v){
                // dump($k);
                // dump($v);
                $money += $v->oprice;
                $shops[] =$v;
  
            }
        }
        // dump($money);
        session(['money'=>$money]);

        
        $i = 1;
        return view('home.cart.shop',['addres'=>$addres,'shops'=>$shops,'i'=>$i]);
        
      
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

    public function number($num,$id)
    {
        // $num;  当前商品的购买数量
        // $id    当前商品id
        DB::beginTransaction();
        $orders = DB::table('orders')->where('id','=',$id)->get();
        // 获取商品的id 
        $info = DB::table('order_info')->where('id',$id)->get();
        
        foreach($info as $key=>$value){
            $gid = $value->gid;

        } 
        // dd($gid);
        // 获取商品的单价 拿去计算 拿去订单表
        $goods = DB::table('Goods_go')->where('id',$gid)->get();
        foreach($goods as $k =>$v){
            $price =$v->price;
        }
        // return $id;
        
        foreach($orders as $key =>$value){
            $order = Orders::find($value->oid);
            $order->number = $num;
            $oprice = $order->oprice = $num * $price;
            $res = $order->save();
            
        }


        // dd($res);
        if($res) {
            DB::commit();
            $arr=[
                'oprice'=>$oprice,
                'num'=>$num,
                'status'=>'success',

            ];
            return $arr;
        } else {
            DB::rollBack();
            $arr=[
                'oprice'=>$oprice,
                'num'=>$num-1,
                'status'=>'error',

            ];
            return $arr;
        }
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
        $order->oid = $oid = date('Ymdhis').rand(1000,9999);
        // 总价
        $order->oprice = $oprice;
        // 数量
        $order->number = $num;
        // 用户id
        $order->uid = $uid;
        // 添加
        $res = $order->save();

        // 接受返回id 添加进订单详情表
        $maxid = DB::table('Orders')->where('uid',$uid)->max('id');
        
        $info = new Order_info;
        // 跟订单id关联的id
        $info->id = $maxid; 
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
        // echo $id;
        // 获取订单表的id 删除所有与之关联的表的信息
        DB::beginTransaction();
        // $order = Orders::find($id);
        $order = DB::table('orders')->where('id',$id)->get();

        foreach($order as $k => $val) {
            $oid = $val->oid;
        }
        // dd($oid);
        $res = Orders::destroy($oid); 
        // dd($oid);
        $res2 = order_info::destroy($oid); 
        // dd($res2);
        if($res && $res2){
            DB::commit();
            return redirect('/home/shop')->with('success','删除成功');
        }else{
            DB::rollBack();
            return redirect('/home/shop')->with('error','删除失败');
        }
    }

    public function del($id)
    {
        // dd($id);
        // 获取订单表的id 删除所有与之关联的表的信息
        DB::beginTransaction();
        // $order = Orders::find($id);
        $order = DB::table('orders')->where('id',$id)->get();
        // dd($order);
        foreach($order as $k => $val) {
            $oid = $val->oid;
            // dd($oid);
        }
        // dd($oid);
        $res = Orders::destroy($oid); 
        // dd($oid);
        $res2 = order_info::destroy($oid); 
        // dd($res2);
        // dump($res);
        // dd($res2);
        if($res && $res2){
            DB::commit();
            return '<script>alert("商品已删除");location.href="/home/shop"</script>';
        }else{
            DB::rollBack();
            return '<script>alert("商品删除失败");location.href="/home/shop"</script>';
        }
    }

    // 清空购物车
    public function out() 
    {   
        DB::beginTransaction();

        // 获取用户id
        $uid = session('home_user')['id'];
        // dd($uid);
        // 获取这个用户在订单表中的处于购物车状态的订单表 然后删除
        // 先获取关联的oid  两个一起删除
        $info = DB::table('orders')->where('uid',$uid)->where('status','0')->get(); 
        foreach($info as $key=>$value) {
            $res1 = DB::table('order_info')->where('oid',$value->oid)->delete();
        }
        $res = DB::table('orders')->where('uid',$uid)->where('status','0')->delete();

        if($res && $res1){
             DB::commit();
            return '<script>alert("购物车已清空");location.href="/home/shop"</script>';
        }else{
            DB::rollBack();
            return '<script>alert("网络延时，请稍后尝试");location.href="/home/shop"</script>';
        }
    }

}


