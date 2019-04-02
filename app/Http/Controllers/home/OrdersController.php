<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodsgo;
use App\Models\Address;
use App\Models\Orders;
use App\Models\Order_info;
// use App\Models\Goodsgo;
use DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

        // dd($request->addres);
        // dd($_POST);
        DB::beginTransaction();


        
        $order = new Orders;
        // // 商品id
        // $order->gid = (session('goodsshow')['id']);
        // 用户ID
        $order->uid = (session('home_user')['id']);
        // 数量
        $order->number = (session('goodsshow')['shopnum']);
        // 订单号
        $ordernum = $order->oid = date('Ymdhis').rand(1000,9999);
        // 订单总价
        $order->oprice = ((session('goodsshow')['shopnum']) * (session('goodsshow')['price']));
        // 收货地址id
        $order->aid = $request->addres;
        // 状态 这里是结算了 所以是1 （已付款 代发货）
        $order->status = 1;
        
        $res = $order->save();
    
        $order_info = new Order_info;
        $order_info->oid = $ordernum;
        $order_info->gid = (session('goodsshow')['id']);
        $order_info->aid = $request->addres;
        $order_info->otime = date('Y-m-d h:i:s');
        // $order_info->uid = (session('home_user')['id']);
        $res_info = $order_info->save();
        if($res && $res_info){
            DB::commit();
            return '<script>alert("支付成功");location.href="/home/udai"</script>';
        }else{
            DB::rollBack();
            return '<script>alert("支付失败");location.href="/home/udai"</script>';

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 从商品详情-》立即购买-》结算页 
        // echo '1';
        // 查询过来的商品的id 的信息
        $goods_info = Goodsgo::find($id);

        // 查询相关联的用户下的地址表
        $uid = session('home_user')['id'];
        $addres = DB::table('address')->where('uid',$uid)->get(); 

        return view('home.order.order',['goods_info'=>$goods_info,'addres'=>$addres]);
    }


    public function number($num)
    {   
        // 将数量 押送session
        // 获取 存在于session里面
        session('goodsshow')['shopnum'] = $num;
        return $num;
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public  function shoppay(Request $request,$id)
    {
        // $lists = $_POST;
        DB::beginTransaction();         
        // dd($_POST);
        // 地址
        $addres = $request->addres;
        $lists = $request->except(['_token','addres','pay-mode']);
        // 用户id
        $uid = session('home_user')['id'];
        // dd($uid);
        // 订单号 
        foreach($lists as $key=>$value){
            // 这是订单的id(不是主键) 主键是oid  status =0
            // dump($key);
            $total = new Orders;
            $testshop[] = $total->where('id','=',$key)->get();
            
            // dump($testshop);        
            // 记得操作数据回滚

        }
        // dump($testshop);
        foreach($testshop as $key =>$value){
            // dump($key);
            // dump($value);
            foreach($value as $k =>$v){
                // dump($k);
                // dump($v->oid);
                $newoid = date('Ymdhis').rand(1000,9999);
                $neworder = Orders::find($v->oid);
                $neworder->status = $v->status = 1;
                $neworder->aid = $addres;
                // 获取购买的数量 
                $number = $neworder->number;
                // 将这批同时付款的订单修改他的订单号 使他成为一个订单  订单表跟他相关联的
                $neworder->oid = $newoid;
                $res = $neworder->save();
                // 修改关联的详情
                $newinfo = Order_info::find($v->oid);
                // dump($newinfo);
                $newinfo->oid = $newoid;
                $newinfo->aid = $addres;
                // 获取商品id 修改库存
                $gid = $newinfo->gid;
                $res1 = $newinfo->save();
                
                $goods = Goodsgo::find($gid);
                $newnumber = $goods->goodsNum; 
                $goods->goodsNum = ($newnumber - $number);
                $res2 = $goods->save();
                DB::commit();
                echo '<script>alert("支付成功");location.href="/home/udai"</script>';
                if(!($res && $res1 && $res2)) {
                    DB::rollBack();
                    return '<script>alert("支付失败");location.href="/home/shop"</script>';
                }
            }    
        }
    }


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
            return '<script>alert("订单已取消");location.href="/home/udai"</script>';
        }else{
            DB::rollBack();
            return '<script>alert("取消订单，请稍后尝试");location.href="/home/udai"</script>';
        }
    }

}
