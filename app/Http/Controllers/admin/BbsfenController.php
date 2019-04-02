<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BbsfenStoreRequest;
//use App\Http\Requests\CatesEditStoreRequest;
use DB;
use App\Models\Bbsfen;

class BbsfenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCates()
    {
        $date=DB::select("select *,concat(path,',',id) as paths from bbsfen order by paths ");
        foreach($date  as $k => $v)
        {
            $n=substr_count($v->path,',');
            $date[$k]->cname=str_repeat('|----', $n).$v->cname;
        }
        return $date;
    }
    public function index(Request $request)
    {
        //$date=cates::all();
        //echo '123';exit;
        //$count=$request->input('count','5');
        //$search=$request->input('search','');
        //$date=cates::where('cname','like','%'.$search.'%')->paginate($count);
        //dd($date);
        //$date=DB::select("select *,concat(path,',',id) as paths from cates order by paths");
        //dd($date);
        return view('admin/bbsfen/index',['date'=>self::getCates()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$cates=new cates;
        //$date=cates::find();
        $id=$request->input('id','');
        $date=Bbsfen::all();
        

        return view('admin/bbsfen/create',['id'=>$id,'date'=>self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BbsfenStoreRequest $request)
    {
        //
        //var_dump($request->all());exit;
        $cates=new Bbsfen;
        $cates->cname=$request->input('cname','');
        $cates->pid=$request->input('pid','');
        $cates->status=1;
        //dd($cates->pid);
        if($request->input('pid')==0)
        {
            $cates->path=0;
        }else
        {   $date=Bbsfen::find($request->input('pid'));
            $cates->path=$date->path.','.$date->id;
        }
        $res1=$cates->save();
        if($res1)
        {
            return redirect('admins/bbsfen')->with('success','添加成功');
        }else
        {
            return redirect('admins/bbsfen')->with('error','添加失败');
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
        $date=Bbsfen::find($id);
        return view('admin/bbsfen/edit',['date'=>$date]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BbsfenStoreRequest $request, $id)
    {
        $date=Bbsfen::find($id);
        $date->cname=$request->input('cname','');
        $res1=$date->save();
        if($res1)
        {
            return redirect('admins/bbsfen')->with('success','修改成功');
        }else
        {
            return redirect('admins/bbsfen')->with('error','修改失败');
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
         //$res1=cates::destroy($id);
         //if($res1)
        //{
            //DB::commit();
            //return redirect('admin/cates')->with('success','删除成功');
        //}else
        //{
            //DB::rollBack();
            //return back()->with('error','删除失败');
        //}
        $child_date=Bbsfen::where('pid',$id)->first();
       
        if($child_date)
        {
            return back()->with('error','还有子分类,不能删除');
            exit;
        }
        if(Bbsfen::destroy($id))
        {
            return redirect('admins/bbsfen')->with('success','删除成功');
        }else
        {
            return back()->with('error','删除失败');
        }
    }
}
