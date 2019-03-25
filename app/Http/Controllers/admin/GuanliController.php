<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guanli;
//use App\Http\admin\Guanli;
//use App\Http\Requests\GuanliStoreRequest;
//use App\Http\Requests\GuanliStoreRequest;
use App\Http\Requests\GuanliStoreRequest;

use Illuminate\Support\Facades\Storage;

use DB;

class GuanliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //echo '123';
        $count=$request->input('count',5);
        $search=$request->input('search','');
        $guanli=Guanli::where('name','like','%'.$search.'%')->paginate($count);
        //var_dump($userlist);
        return view('admin.guanli.index',['guanli'=>$guanli,'request'=>$request->all(),]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo '456';
        return view('admin/guanli/guanli');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuanliStoreRequest $request)
    {
        //dump($request->all());
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
        $Guanli = new Guanli;
        $Guanli->logo=$name;
        $Guanli->name=$request->input('name','');
        $Guanli->desc=$request->input('desc','');
        $Guanli->filing=$request->input('filing','');
        $Guanli->phone=$request->input('phone','');
        $Guanli->statu=$request->input('statu','');
        $Guanli->url=$request->input('url','');
        $Guanli->cright=$request->input('cright','');
        //$Guanli->filing=$request->input('status','');
        $res1=$Guanli->save();
        
        if($res1)
        {
            DB::commit();
            return redirect('admins/guanli')->with('success','添加成功');
        }else
        {
            DB::rollBack();
            return redirect('admins/guanli')->with('error','添加失败');
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
        $guanli = Guanli::find($id);
        return view('admin/guanli/edit',['guanli'=>$guanli]);
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
        DB::beginTransaction();
        $guanli = Guanli::find($id);

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
            //$Guanli = new Guanli;
            $guanli->logo=$name;
            $guanli->name=$request->input('name','');
            $guanli->desc=$request->input('desc','');
            $guanli->filing=$request->input('filing','');
            $guanli->phone=$request->input('phone','');
            $guanli->statu=$request->input('statu','');
            $guanli->url=$request->input('url','');
            $guanli->cright=$request->input('cright','');
        //$Guanli->filing=$request->input('status','');
            $res1=$guanli->save();
        
            if($res1)
        {
            DB::commit();
            return redirect('admins/guanli')->with('success','修改成功');
        }else
        {
            DB::rollBack();
            return back()->with('error','修改失败');
        }
        
         }else{
            //echo '111';
            $guanli->name=$request->input('name','');
            $guanli->desc=$request->input('desc','');
            $guanli->filing=$request->input('filing','');
            $guanli->phone=$request->input('phone','');
            $guanli->statu=$request->input('statu','');
            $guanli->url=$request->input('url','');
            $guanli->cright=$request->input('cright','');
            $res1=$guanli->save();
        
            if($res1)
        {
            DB::commit();
            return redirect('admins/guanli')->with('success','修改成功');
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
        $guanli = Guanli::find($id);
        //dd($lbts);
        $date=$guanli->logo;
        $res2 = Storage::delete([$date]);
        //dd($date);
        $res1=Guanli::destroy($id);
        //$date=$res1['pic'];
        //dd($res1);
        
        //$date=$lbts['lbts'];
        
        
         if($res1 && $res2)
        {
            DB::commit();
            return redirect('admins/guanli')->with('success','删除成功');
        }else
        {
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
    
}
