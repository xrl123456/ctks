<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bbs;
use App\Models\Bbsfen;
use App\Http\Requests\BbsStoreRequest;
use DB;
use Illuminate\Support\Facades\Storage;

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
        $bbslist=Bbs::where('name','like','%'.$search.'%')->paginate($count);
        //$cateinfo=cates::all();
        //dump($goodslist);exit;
        return view('admin.bbs.index',['bbslist'=>$bbslist,'request'=>$request->all(),]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo'123';
        return view('admin/bbs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BbsStoreRequest $request)
    {
        //dump($request->all());exit;
        
        $bbs = new Bbs;

        //$goods->pic=$name;
        $bbs->status=$request->input('status','1');
        $bbs->name=$request->input('name','');
        $bbs->content=$request->input('content','');
        $bbs->cates=$request->input('cates','');
        //$goods->number=$request->input('number','');
        //$goods->cates=$request->input('cates','');
        $res1=$bbs->save();
        //dump($res1);exit;
        
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
        //echo '111';
         $bbs_edit = Bbs::find($id);
        //dd($user);
        return view('admin/bbs/edit',['bbs_edit'=>$bbs_edit]);
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
        //dump($request->all());
        DB::beginTransaction();
        $bbs_update = Bbs::find($id);

        
        $bbs_update->status=$request->input('status','1');
        $bbs_update->name=$request->input('name','');
        $bbs_update->content=$request->input('content','');
        $bbs_update->cates=$request->input('cates','');
            //$goodedit->status=$request->input('status','');
            $res1=$bbs_update->save();
        
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
        //$bbs_del = Bbs::find($id);
        //dd($lbts);
        //$date=$bbs_del->pic;
        //$res2 = Storage::delete([$date]);
        //dd($date);
        $res1=Bbs::destroy($id);
        //$date=$res1['pic'];
        //dd($res1);
        
        //$date=$lbts['lbts'];
        
        
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
