<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Address;
use DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       //   $id = (session('home_user')['id']);
       //    $address = DB::table('address')->where('uid', $id)->get();
       // // dd($readss);

       //   return view('home.usershow.address',['address'=>$address]);

        $id = (session('home_user')['id']);
        
        $address = DB::table('address')->where('uid', $id)->where('status','<',2)->get();
        // dd($readss);

        return view('home.usershow.addresindex',['address'=>$address]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 接受新增的信息
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        //
        // 接受新增的信息
        $id = (session('home_user')['id']);

        // 只存五条地址
        // dd($id);
        $only = DB::table('address')->where('uid',$id)->where('status','<','2')->get();
        if((count($only)) >= 5 ){
            return '<script>alert("超过地址限定");location.href="/home/addres"</script>';
        }
        $addres = new Address;
        $addres->uid = $id; 
        $addres->name = $request->name;
        $addres->phone = $request->phone;
        $addres->address = $request->address;

        $res = $addres->save();

        if($res){
            DB::commit();

            return '<script>alert("添加成功");location.href="/home/addres/'.$id.'"</script>';
            // return '<script>alert("当前用户已被禁用");location.href="/home/addres/".</script>';

        }else{
            DB::rollBack();

            return '<script>alert("添加失败");location.href="/home/addres/'.$id.'"</script>';

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
        // echo $id;
        // 获取数据 
        // $readss = Address::get($id);
        // dd($id);

//          $uid = (session('home_user')['id']);
//         $address = DB::table('address')->where('uid', $uid)->get();

        $address = DB::table('address')->where('uid', $id)->where('status','<',2)->get();

        // dd($readss);

        return view('home.usershow.address',['address'=>$address]);
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
        $addres = Address::find($id);
        
        return view('home.usershow.addresedit',['addres'=>$addres]);
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
        DB::beginTransaction();
        
        $addres = Address::find($id);
        $addres->name = $request->name;
        $addres->phone = $request->phone;
        $addres->address = $request->address;
        $res = $addres->save();
        if($res){
            DB::commit();
            return '<script>alert("修改成功");location.href="/home/addres/"</script>';
           
        }else{
            DB::rollBack();
            return '<script>alert("修改失败,请稍后再试");location.href="/home/addres/"</script>';
        }    

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
        // 删除
        $uid = (session('home_user')['id']);
        DB::beginTransaction();
        $res = Address::destroy($id); 
        // $res2 = Super_info::destroy($id); 
        if($res){
            DB::commit();
            return '<script>alert("删除成功");location.href="/home/addres/'.$uid.'"</script>';
           
        }else{
            DB::rollBack();
            return '<script>alert("删除失败");location.href="/home/addres/'.$uid.'"</script>';
        }    
    }

    public function status($id)
    {   
        $uid = (session('home_user')['id']);
        DB::beginTransaction();

        // 先将其他status 小于3 改为 0
        $address = DB::table('address')->where('uid',$uid)->where('status','<',3)->get();
        foreach($address as $key=>$value) {
            $status = Address::find($value->id);
            $status->status = 0;
            $res = $status->save();
            if(!($res)){

                DB::rollBack();
                return '<script>alert("修改失败,请稍后再试");location.href="/home/addres"</script>';

            }
        }
        
        $new = Address::find($id);
        $new->status = 1;
        $nres = $new->save();
        if($res){
            DB::commit();
            return '<script>alert("修改成功");location.href="/home/addres/"</script>';
           
        }else{
            DB::rollBack();
            return '<script>alert("修改失败,请稍后再试");location.href="/home/addres/"</script>';
        }  
    }
}
