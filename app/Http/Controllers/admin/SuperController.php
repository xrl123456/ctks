<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supers;

use App\Models\Super_info;
use App\Http\Requests\SuperStoreRequest;
use App\Http\Requests\SuperUpdateStoreRequest;
use Hash;
use DB;

class SuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supers = Supers::all();
        $i=1;
        // dump($supers->superlist);
        // dd($supers);
        
        return view('admin.super.index',['supers'=>$supers,'i'=>$i]);
    }
        
    public function status($id)
    {
        // echo aaa;
     
        $info = Supers::find($id);
        // 判断 status 是1 还是0 
        if(($info->status) == 0 ){
            // 等于0就将他变成一
            $info->status = '1';
            $res = $info->save();
            
        }else{
            // 不等于0 就变0
            $info->status = '0';
            $res = $info->save();
        }

        $res = $info->status;
        return $res;
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //?????
        // echo '123';
        return view('admin/super/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuperStoreRequest $request)
    {
        
        DB::beginTransaction();

        $supers = new Supers;
        
        $supers->name = $request->input('name','');
        $supers->email =$request->input('email','');
        $supers->phone =$request->input('phone','');
        $supers->password=Hash::make($request->input('password',''));
        $supers->grade = $request->input('grade','');
        $supers->token = str_random(60);
        
        $res = $supers->save();
        // dd($res);
        $uid = $supers->id;
        $info = new  Super_info;
        $info->sid= $uid;
        $res2 = $info->save();

       if($res && $res2){
            DB::commit();
            return redirect('/admins/super/')->with('success','添加成功');
        }else{
            DB::rollBack();
            return redirect('/admins/super/create')->with('error','添加失败');
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
        // echo '??ҳ';
        $super = Super_info::find($id);
        // dd($super);

        $su = Supers::find($id);
        
        // dd($super['name']);

        return view('admin.super.show',['super'=>$super,'su'=>$su]);
    }

    // 图片上传
    public function imgup(Request $request, $id)
    {
        // dd('aaaa');
        // $profile = $request->file('face');
        // $file_name = $profile->store('faces');
        // dd($arr);exit;
        $info = Super_info::find($id);
        $res = $request->file('face')->store('faces');
        $info->face = $res;
        $res1 = $info->save();

        if($res && $res1) {
            $arr = [
                'path'=>$res,
                'msg'=>'success'
            ];
            echo json_encode($arr);
        }else{
            $arr = [
                'path'=>'',
                'msg'=>'error'
            ];
            Storage::delete($res1);
            echo json_encode($arr);


        }
    }
    public function showup(Request $request, $id) 
    {
        
        // echo $res;

       // echo $id;
        // dd($_POST);
        // supers  super_info
        $supers = Supers::find($id);
        $info = Super_info::find($id);
        
        $supers->phone = $request->input('phone','');

        $info->name = $request->input('name','');
        $info->desc = $request->input('desc','');
        $info->sex = $request->input('sex','');

       

    
        $res = $supers->save();
        $res1 = $info->save();

        if($res && $res1){
            DB::commit();
            return redirect('/admins/super/')->with('success','修改成功');
        }else{
            DB::rollBack();
            return redirect('/admins/super/create'.$id)->with('error','修改失败');
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 显示修改页面
        $super = Supers::find($id);
        // dd($super);
        
        return view('admin.super.edit',['super'=>$super]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuperUpdateStoreRequest $request, $id)
    {
        // dd($_POST);

        DB::beginTransaction();
        $supers = Supers::find($id);
        $list = DB::table('supers')
            ->where('id',$id)
            ->where('name', 'like',$request->input('name',''))
            ->get();   
        // dd($list);
        if(!count($list) == 1){

            $supers->name = $request->input('name','');
            $new = DB::table('supers')
            ->where('name', 'like',$request->input('name',''))
            ->get();
            if($new) {
                 DB::rollBack();
                return redirect('/admins/super/'.$id.'/edit')->with('error','上传失败');    
            }
        }
        $supers->email = $request->input('email','');
        $supers->phone = $request->input('phone','');
      
        $supers->grade = $request->input('grade','');
        $res = $supers->save();

        if($res){
            DB::commit();
            return redirect('/admins/super/')->with('success','修改成功');
        }else{
            DB::rollBack();
            return redirect('/admins/super/'.$id.'/edit')->with('error','修改失败');
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
        // 删除
        DB::beginTransaction();
        $res = Supers::destroy($id); 
        $res2 = Super_info::destroy($id); 
        if($res && $res2){
            DB::commit();
            return redirect('/admins/super')->with('success','删除成功');
        }else{
            DB::rollBack();
            return redirect('/admins/super')->with('error','删除失败');
        }
    }
}
