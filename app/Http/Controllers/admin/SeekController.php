<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSeekStroeRequest;
use App\Http\Requests\AdminSeekupStroeRequest;

use App\Models\Supers;
use Hash;
use Mail;
use DB;

class SeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 找回验证 邮箱
        
        return view('admin.login.seek');
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
        // 接受表单传值 
        // dd($_POST);
        $name = $request->name;
        $email = $request->email;
        
        // 通过这两个字段 查询出是否有这个账号
        $list = Supers::where('name','=',$name)->where('email','=',$email)->get();
        foreach($list as $k=>$v) {
            $id = $v->id;
        }
        $super = Supers::find($id);
        $super->save();
        $token=$super->token;

        // dd($token);
        if(count($list)) {

            // 发送邮件
            Mail::send('admin.login.email', ['user' => $name,'id'=>$id,'token'=>$token], function ($m) use ($request) {

            $m->to($request->email)->subject('lavarel-商城后台管理系统');


        });
            return '<script>alert("邮件已发送，请尽快修改");location.href="/admins/login";</script>';
                
        }else{
            return '<script>alert("用户名与邮箱不匹配");location.href="/admins/seek"</script>';
            // return redirect('/admins/seek')->with('error','邮箱或用户名不正确');

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
    
    // 接受邮箱验证
    public function email($id,$token)
    {
        // dump($token);
        // dd($id);
        // 判断过来的数据是否正确
        $supers = Supers::find($id);
        // 验证 token是否zhengque
        if($supers->token != $token) {
            // 展示先显示 登录 以后记得改去首页
            return '<script>alert("记得改这个路劲去首页");location.href="/admins/login";</script>';
        }

        // 重新生成 token 
        $supers->token = str_random(60);
        $supers->save();
         

        return view('admin.login.edit',['id'=>$id]);
        
    } 
    public function edit($id)
    {
        // 修改密码 
        // echo $id;
        // dd($_GET);
        return view('admin.login.edit',['id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminSeekupStroeRequest $request, $id)
    {
        // 接受 修改密码
        $supers = Supers::find($id);

        // 重新生成 token 
        $supers->password = Hash::make($request->password);
        if($supers->save()) {
            return '<script>alert("修改成功");location.href="/admins/login";</script>';
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
    }
        
}
