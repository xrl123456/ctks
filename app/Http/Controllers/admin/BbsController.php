<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Bbs;
use App\Http\Requests\BbsStoreRequest;
use App\Http\Requests\BbseditStoreRequest;

class BbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count=$request->input('count',5);
        $search=$request->input('search','');
        $bbslist=Bbs::where('title','like','%'.$search.'%')->paginate($count);
 
        return view('admin.bbs.index',['bbslist'=>$bbslist,'request'=>$request->all(),]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BbsStoreRequest $request)
    {
        DB::beginTransaction();
        $Bbs = new Bbs;
        $Bbs->title=$request->input('title','');
        $Bbs->content=$request->input('content','');
        $res1=$Bbs->save();
        
        if($res1)
        {
            DB::commit();
            return redirect('admins/bbs')->with('success','添加成功');
        }else
        {
            DB::rollBack();
            return redirect('admins/bbs')->with('error','添加失败');
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
        $bbs = Bbs::find($id);
        //dd($user);
        return view('admin.bbs.edit',['bbs'=>$bbs]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BbsStoreRequest $request, $id)
    {
        //dd($request->all());
        //var_dump($request->all());
        DB::beginTransaction();
        $bbs=Bbs::find($id);
        //$user->name=$request->input('name','');
        $bbs->title=$request->input('title','');
        $bbs->content=$request->input('content','');
        $res1=$bbs->save();
        if($res1)
        {
            DB::commit();
            return redirect('admins/bbs')->with('success','修改成功');
        }else
        {
            DB::rollBack();
            return back()->with('error','修改失败');
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
        DB::beginTransaction();
        $res1=Bbs::destroy($id);
         if($res1)
        {
            DB::commit();
            return redirect('admins/bbs')->with('success','删除成功');
        }else
        {
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
