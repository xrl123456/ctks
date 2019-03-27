<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginStroeRequest;
use App\Models\Supers;
use Hash;
use DB;
class LoginController extends Controller
{


    public static function Admin_user()
    {   

       // dd(session('admin_user'));
        // dd($admin_user);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 登录 -- 首页
        // self::Admin_user();
        // $data = session('admin_user');
        // dd($data);
        return view('admin.login.index');
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
    public function store(AdminLoginStroeRequest $request)
    {
        // 接受 登录信息
        // dd($_POST);
        
        $name = $request->name;
        $password = $request->password;

        // 接受数据对比
        // 正确就 session 添加admin_login 字段 复制 当前用户名  跳转后台首页
        // 连贯操作  先查询 这个名字的值 看有没有  有 对比密码   Hash::check('字符串', $加密的密码)
        $list = Supers::where('name','=',$name)->get();
        // dd($list);
        if(count($list)) {
            // echo '有';
            // 有 返回的数据 
            foreach($list as $key =>$value){
                $id=($value->id);
                $pass=($value->password);
                $grade = ($value->grade);
                $status = ($value->status);
                $face = ($value->superlist->face);
            }
            $arr=[
                'id'=>$id,
                'name'=>$name,
                'grade'=>$grade,
                'face'=>$face,
                'status'=>$status,
            ];
            // dd($arr);
            // 判断密码 
            if (Hash::check($password, $pass)) {
                        // echo '1<br>'; 
                if($arr['status'] == 1) {
                    return '<script>alert("当前用户已被禁用");location.href="/admins/login/"</script>';

                }
                // 密码正确  将用户名压入数据库 还有等级   id  
                session(['admin_user' => $arr]); 
                // dd(session('admin_user'));
                // 
                // 用户名跟密码正确 查询状态 
                return redirect('/admins');
            }else{
                // 密码不正确 返回
                return '<script>alert("密码错误");location.href="/admins/login/"</script>';

            }

        }else{
            // echo '没有';
            // 没有 数据相匹配 返回 error 
            // return 'error';
            // 不存在的用户 返回
            return '<script>alert("当前用户不存在");location.href="/admins/login/"</script>';
            // return redirect('/admins/login/')->with('error','当前用户不存在');

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

        //删除
        session()->forget('admin_user');
        return '<script>alert("退出成功,");location.href="/";</script>';

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
     * @param  \Illumsinate\Http\Request  $request
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
