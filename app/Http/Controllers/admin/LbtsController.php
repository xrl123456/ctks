<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Lbts;
use App\Http\Requests\LbtsStoreRequest;
use Illuminate\Support\Facades\Storage;


class LbtsController extends Controller
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
        $lbtslist=lbts::where('simg','like','%'.$search.'%')->paginate($count);
        //var_dump($userlist);
        return view('admin.lbts.index',['lbtslist'=>$lbtslist,'request'=>$request->all(),]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/lbts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LbtsStoreRequest $request)
    {
        //dump($request->all());
        //dd($_FILES);
        $file = $request->file('pic');
        //dd($file);
        
        DB::beginTransaction();
        if ($request->hasFile('pic')) {
            // 接收文件上传对象
            $file = $request->file('pic');

            // 通过对象 上传文件
            // $name = $file->store('abc');
            // dump($name);
            

            // 处理文件上传名称
            $temp_name = time()+rand(10000,99999);
            $ext = $file->extension();//获取后缀
            $filename = $temp_name.'.'.$ext;
            // 上传文件  并且 自定义名称
            $name = $file->storeAs('we',$filename);
            //dd($name);

        }else{
            dd('请选择');
        }
        $lbts = new Lbts;
        $lbts->pic=$name;
        $lbts->simg=$request->input('simg','');
        $lbts->surl=$request->input('surl','');
        $lbts->status=$request->input('status','');
        $res1=$lbts->save();
        
        if($res1)
        {
            DB::commit();
            return redirect('admins/lbts')->with('success','添加成功');
        }else
        {
            DB::rollBack();
            return redirect('admins/lbts')->with('error','添加失败');
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
        
        //echo '666';
        //var_dump($request->all());
        $lbts = lbts::find($id);
        return view('admin/lbts/edit',['lbts'=>$lbts]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LbtsStoreRequest $request, $id)
    {
        //echo '666';
        //var_dump($request->all());
        DB::beginTransaction();
        $lbts = lbts::find($id);

        if ($request->hasFile('pic')) {
            // 接收文件上传对象
            $file = $request->file('pic');

            // 通过对象 上传文件
            // $name = $file->store('abc');
            // dump($name);
            

            // 处理文件上传名称
            $temp_name = time()+rand(10000,99999);
            $ext = $file->extension();//获取后缀
            $filename = $temp_name.'.'.$ext;
            // 上传文件  并且 自定义名称
            $name = $file->storeAs('we',$filename);
            //dd($name);
            $lbts->pic=$name;
            $lbts->simg=$request->input('simg','');
            $lbts->surl=$request->input('surl','');
            $lbts->status=$request->input('status','');
            $res1=$lbts->save();
        
            if($res1)
        {
            DB::commit();
            return redirect('admins/lbts')->with('success','修改成功');
        }else
        {
            DB::rollBack();
            return back()->with('error','修改失败');
        }
        

        }else{
            //echo '111';
            $lbts->simg=$request->input('simg','');
            $lbts->surl=$request->input('surl','');
            $lbts->status=$request->input('status','');
            $res1=$lbts->save();
        
            if($res1)
        {
            DB::commit();
            return redirect('admins/lbts')->with('success','修改成功');
        }else
        {
            DB::rollBack();
            return back()->with('error','修改失败');
        }
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
        $lbts = Lbts::find($id);
        //dd($lbts);
        $date=$lbts->pic;
        $res2 = Storage::delete([$date]);
        //dd($date);
        $res1=Lbts::destroy($id);
        //$date=$res1['pic'];
        //dd($res1);
        
        //$date=$lbts['lbts'];
        
        
         if($res1 && $res2)
        {
            DB::commit();
            return redirect('admins/lbts')->with('success','删除成功');
        }else
        {
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
    
}
