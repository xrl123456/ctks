<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Models\Users;
class modifypwdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.udai.udai_modifypwd');
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
         //用户id
            $id = (session('home_user')['id']);
            //原来密码
             $password =$request->input('password','');

             $users = Users::find($id);
            $paw = $users->password;
             //数据库密码
             if(Hash::check($password,$paw)){
                return view('home.udai.udai_modifypwd_step2');
             }else{
                 echo "<script>alert('原密码错误');location.href='/home/modifypwd';</script>";
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


     public function modifypwdoto(Request $request)
      {

        //用户id
         $id = (session('home_user')['id']);
          $users = Users::find($id);
         $phone =$request->input('phone','');
          $phoneto = $request->input('phoneto','');
        if($phone == $phoneto ){
            $users->password =Hash::make($phone);
            $res = $users->save();
           if($res){
                 session()->forget('home_user');
                return view('home.udai.udai_modifypwd_step3');
           }else{
             echo "<script>alert('修改失败');location.href=''/home/udai_modifypwd_step3';</script>";
           }

          
        }else{
            echo "<script>alert('俩密码不一致');location.href='/home/modifypwd';</script>";
        }
        // return view('home.udai.udai_modifypwd_step3');
      }
}
