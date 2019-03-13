<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UptableStoreRequest;
use App\Models\Users;
use Hash;
use App\Models\Userinfo;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // echo '111';
        $count = $request->input('count',5);
        // dump($request->all());
        $search = $request->input('search',''); 
        $users = Users::where('name','like','%'.$search.'%')->paginate($count);
        return view('admin.users.index',['users'=>$users,'request'=>$request->all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
      
         /*
            开启事务   DB::beginTransaction();
            提交事务   DB::commit()
            回滚事务   DB::rollBack()
         */
        DB::beginTransaction();
        // dump($request->all());
        $users = new Users;
        $users->name = $request->input('name','');
        $users->email =$request->input('email','');
        $users->phone =$request->input('phone','');
        $users->password=Hash::make($request->input('password',''));
        $users->status = $request->input('status','');
        $res = $users->save();
        //关联用户详情表
        $uid = $users->id;

        $info = new  Userinfo;
        $info->uid= $uid;
       $res2 = $info->save();
       if($res && $res2){
            DB::commit();
        return redirect('/admins/users/')->with('success','添加成功');
     }else{
        DB::rollBack();
        return redirect('/admins/users/')->with('error','添加失败');
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
        // dump($id);
            $users = Users::find($id);
     
         
         return view('admin.users.edit',['users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UptableStoreRequest $request, $id)
    {
        //
        // dump($request->all());
        DB::beginTransaction();
        $users = Users::find($id);
        $users->name = $request->input('name','');
        $users->email =$request->input('email','');
        $users->phone =$request->input('phone','');
      
        $users->status = $request->input('status','');
        $res = $users->save();
        if($res){
            DB::commit();
        return redirect('/admins/users')->with('success','修改成功');
     }else{
        DB::rollBack();
        return redirect('/admins/users')->with('error','修改失败');
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
        // echo '21';
        // dump($id);
         DB::beginTransaction();
        $res = Users::destroy($id); 
        $res2 = Userinfo::where('uid',$id)->delete();
        if($res && $res2){
            DB::commit();
            return redirect('/admins/users')->with('success','删除成功');
         }else{
            DB::rollBack();
            return redirect('/admins/users')->with('error','删除失败');
         }

    }
}
