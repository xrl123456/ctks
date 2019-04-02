<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Order_info;
use App\Models\Goodsgo;
use App\Models\address;
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
        // 后台订单首页 
        // 获取所有数据
        $orders =  new Orders;
        $order = $orders->where('status','>','0')->get();
        // dd($order);
        
        return view('admin.orders.index',['order'=>$order]);
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
        // 接受修改后的订单
        DB::beginTransaction();
        // dd($_POST);

        $address = Address::find($request->aid);
        $uid = $address->uid;
        if(!(
            $address->name == $request->addresname 
            &&
            $address->phone == $request->addresphone
            &&
            $address->address == $request->addres)
        ){
            $ares = true;
        }else{
            $add = new Address;
            $add->uid = $uid;
            $add->name = $request->addresname; 
            $add->phone = $request->addresphone;
            $add->address = $request->addres;
            $add->status = 3;
            $ares = $add->save();
            // 修改后的临时地址表的id
            $aid = $add->id;

        }
        // 
        // 商品
        $goods = Goodsgo::find($request->gid);
        if($goods->goodsNum > $request->number) {
            $goods->goodsNum = $goods->goodsNum - $request->number;
            $price = $goods->price;
            // dd($price);
            $gres = $goods->save();
            
        }else{
            return '<script>alert("库存不足");location.href="/admins/order/'.$request->oid.'/edit"</script>';
        }
        

        // 订单表更改
        $orders = Orders::find($request->oid);
        $orders->number = $request->number;
        $orders->oprice =  $request->number * $price;
        $orders->aid = $request->aid;
        $orders->status = $request->status;
        $ores = $orders->save();

        // 详情
        $orinfo = Order_info::find($request->oid);
        $orinfo->aid = $request->aid;
        $ires = $orinfo->save();

        if($ares && $gres && $ores && $ires){
            DB::commit();
            return '<script>alert("修改成功");location.href="/admins/order/"</script>';

        }else{
            DB::rollBack();
            return '<script>alert("错误，请稍后尝试");location.href="/admins/order/'.$request->oid.'/edit"</script>';

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
        //
        $order = new Orders;
        $info = $order->where('oid',$id)->get();
        // dd($info);
        // dd($order);
        return view('admin.orders.info',['info'=>$info]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 修改订单状态
        $order = new Orders;
        $info = $order->where('oid',$id)->get();
 
        return view('admin.orders.status',['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     *
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
