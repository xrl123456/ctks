<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodsgo;
use App\Models\Address;
use App\Models\Orders;
use App\Models\Order_info;
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
        DB::beginTransaction();         
        
        $order = new Orders;
        // // 商品id
        // $order->gid = (session('goodsshow')['id']);
        // 用户ID
        $order->uid = (session('home_user')['id']);
        // 数量
        $order->number = (session('goodsshow')['shopnum']);
        // 订单号
        $order->oid = date('Ymdhis').rand(1000,9999);
        // 订单总价
        $order->oprice = ((session('goodsshow')['shopnum']) * (session('goodsshow')['price']));
        // 收货地址id
        $order->aid = $request->addres;
        // 状态 这里是结算了 所以是1 （已付款 代发货）
        $order->status = 1;
        
        $res = $order->save();

        $order_info = new Order_info;
        $order_info->oid = $order->oid;
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
