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
         $id = (session('home_user')['id']);
         $address = DB::table('address')->where('uid', $id)->get();
        // dd($readss);

        return view('home.usershow.address',['address'=>$address]);
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
        //
        // 接受新增的信息
        $id = (session('home_user')['id']);
        // dump($_POST);
        $addres = new Address;
        $addres->uid = $id; 
        $addres->name = $request->name;
        $addres->phone = $request->phone;
        $addres->address = $request->address;

        $res = $addres->save();

        if($res){
            return '<script>alert("添加成功");location.href="/home/addres/'.$id.'"</script>';
            // return '<script>alert("当前用户已被禁用");location.href="/home/addres/".</script>';

        }else{
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
        $address = DB::table('address')->where('uid', $id)->get();
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
}
