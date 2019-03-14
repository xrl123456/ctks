<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinksStoreRequest;
use App\Http\Requests\LuptableStoreRequest;
use App\Models\Links;
use DB;


class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // 获取所有数据  拿出来
        $links = Links::all();
        // 这是拿过去给编号用的
        $i = 1;
        // 将获取到的数据添加进列表中
        return view('admin.links.index',['links'=>$links,'i'=>$i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // echo '添加列表';
        return view('admin.links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinksStoreRequest $request)
    {
        // 处理添加
        // dd($_POST);
        // 
        // 判断只允许十条数据 多的不添加
        if(count($links = Links::all()) >= 10) {
            DB::rollBack();
            return redirect('/admins/links/create')->with('error','数据已超出限额不允许添加');
        }else{

        
        /*
            开启事务   DB::beginTransaction();
            提交事务   DB::commit()
            回滚事务   DB::rollBack()
         */
        DB::beginTransaction();
        // dump($request->all());
        $links = new Links;
        $links->lname = $request->input('lname','');
        $links->lurl = $request->input('lurl','');
        $res = $links->save();
        // dump($res);exit;


        if($res){
            DB::commit();
            return redirect('/admins/links/')->with('success','添加成功');
        }else{
            DB::rollBack();
            return redirect('/admins/links/create')->with('error','添加失败');
        }

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
        //修改数据列表
        // 获取ID  拿出数据修改
        
        $links = links::find($id);
        // dd($links);
        return view('admin.links.edit',['links'=>$links]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LuptableStoreRequest $request, $id)
    {
        // 处理修改
        // echo $id;
        // dd($_POST);
        DB::beginTransaction();
        $links = links::find($id);
        $links->lname = $request->input('lname','');
        $links->lurl = $request->input('lurl','');
        $res = $links->save();
        if($res){
            DB::commit();
        return redirect('/admins/links')->with('success','修改成功');
     }else{
        DB::rollBack();
        return redirect('/admins/links/'.$id.'/edit')->with('error','修改失败');
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
        //删除数据操作
        // dd($_POST);

        DB::beginTransaction();
        $res = links::destroy($id); 
        if($res){
            DB::commit();
            return redirect('/admins/links')->with('success','删除成功');
        }else{
            DB::rollBack();
            return redirect('/admins/links')->with('error','删除失败');
        }

    }
}
