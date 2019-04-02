<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Order_info;
use App\Models\Address;
use App\Models\Goodsgo;
use DB;

class UsershowController extends Controller
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
        //  个人中心的订单详情
        
        // echo $id; 商品id  由于id 不是主键 所以 连贯查找
        
        $order = new Orders;
        $orderlist = $order->where('id',$id)->get();
        // 根据aid 获取地址信息
        foreach($orderlist as $key=>$value) {
            $aid = $value->aid;
        }
        $addres = Address::find($aid);
        // dd($addres);

        return view('home.usershow.orderinfo',['addres'=>$addres,'orderlist'=>$orderlist]);
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
        // echo $id;
        DB::beginTransaction();
    
        $order = Orders::find($id);
        $order->status += 1;
        $res = $order->save();
        if($res){
            DB::commit();
            return '<script>alert("确认签收成功");location.href="/home/udai"</script>';

        }else{
            DB::rollBack();
            return '<script>alert("错误，请稍后尝试");location.href="/home/udai"</script>';

        }
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
