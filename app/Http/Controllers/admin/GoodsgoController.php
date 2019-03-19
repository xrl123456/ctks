<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Models\Goodsgo;
use App\Models\Goods;
use DB;
use App\Http\Requests\GoodsgoStoreRequest;
use Illuminate\Support\Facades\Storage;
class GoodsgoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //初始化
        $goodsgo = Goodsgo::all();
        return view('admin.goodsgo.index',['goodsgo'=>$goodsgo]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //连接数据库查询分类排序(查询所有 ，
        //DB::raw(拼接(字段名,'按什么拼接',和那个拼接)as 取别名))->按什么顺序排(字段名,什么顺序)->执行；
        $goods = DB::table('goods_type')->select('*',DB::raw('concat(path,",",id)as paths'))->orderBy('paths','asc')->get();
        //拼接
        foreach($goods  as $k=>$v ){
                //统计","出现的次数
                 $n = substr_count($v->path,',');
                 //拼接
                 $goods[$k]->cname = str_repeat('|-----',$n).$v->cname;
               }
        return view('admin.goodsgo.create',['goods'=>$goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( GoodsgoStoreRequest $request)
    {
         //检测是否有文件上传
        if($request->hasFile('pic')) {
        DB::beginTransaction();
        //创建文件上传对象
        $file = $request->file('pic');
        //处理文件上传名称
        $temp = time()+rand(1000,9999);
        //获取文件后缀
        $ext = $file->extension();
        //拼接图片名
        $page = $temp.'.'.$ext;
        //上传文件 并且自定义名称
        $name = $file->storeAs('Goods',$page);
         //初始化数据库
        $goods = new Goodsgo;
        //获取值
        $goods->gname = $request->input('gname','');
        $goods->pic = $page;
        $goods->price = $request->input('price','');
        $goods->goodsNum = $request->input('goodsNum','');
        $goods->tid = $request->input('tid','');
        $goods->status = $request->input('status','');
        $goods->goodsinfo = $request->input('goodsinfo','');
        //插入数据库
        $res = $goods->save();
        //判断是否成功
            if($res) {    DB::commit();
                        return redirect('/admins/goodsgo')->with('success','添加成功');  
                    }else{
                        DB::rollBack();
                        return redirect('/admins/goodsgo')->with('error','添加失败');
                    }
       
       }else{
         DB::rollBack();
        return redirect('/admins/goodsgo/create')->with('error','图片不能为空');
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
         DB::beginTransaction();
         $goods = Goodsgo::find($id);
           $b=$goods->status;
           if($b){
                //显示下架时
                $c = 0;
                $goods->status = $c;
                $res = $goods->save();
                 if($res) {    
                        DB::commit();
                        return redirect('/admins/goodsgo')->with('success','上架成功');  
                    }else{
                        DB::rollBack();
                        return redirect('/admins/goodsgo')->with('error','上架失败');
                    }
           }else{
                //显示上架时
                $b = 1;
            $goods->status = $b;
             $res = $goods->save();
                 if($res) {    
                        DB::commit();
                        return redirect('/admins/goodsgo')->with('success','下架成功');  
                    }else{
                        DB::rollBack();
                        return redirect('/admins/goodsgo')->with('error','下架失败');
                    }

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
        
            //初始化数据库
            $goods = Goodsgo::find($id);
             $type = DB::table('goods_type')->select('*',DB::raw('concat(path,",",id)as paths'))->orderBy('paths','asc')->get();
            //拼接
            foreach($type as $k=>$v ){
                // echo $v->path.'<br/>';
                //统计","出现的次数
                 $n = substr_count($v->path,',');
                 //拼接
                 $type[$k]->cname = str_repeat('|-----',$n).$v->cname;
               }


            
        return view('admin.goodsgo.edit',['goods'=>$goods,'type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsgoStoreRequest $request, $id)
    {
        
         
        $pic =$request->has('pic');
        // 判断是否编辑图片
        if($pic == ''){
            //不编辑图片
            DB::beginTransaction();
            //获取当前数据的所有值
         $goods = Goodsgo::find($id);
            //修改过后的所有值
            $goods->gname = $request->input('gname','');
            $goods->price = $request->input('price','');
            $goods->goodsNum = $request->input('goodsNum','');
            $goods->goodsinfo = $request->input('goodsinfo','');
            $goods->tid = $request->input('tid','');
            $goods->status = $request->input('status','');
            $res = $goods->save();
                if($res){
                            DB::commit();
                            return redirect('/admins/goodsgo/')->with('success','修改成功');
                        }else{
                            DB::rollBack();
                            return redirect('/admins/goodsgo/')->with('error','修改失败');
                        }
           }else{
            //编辑图片
         DB::beginTransaction();
         //获取当前数据的所有值
         $goods = Goodsgo::find($id);
         $pic=$goods->pic;
         //拼接图片路径
         $ret ='Goods/'.$pic;
         //删除图片
         Storage::delete($ret);

       //创建文件上传对象
        $file = $request->file('pic');
        //处理文件上传名称
        $temp = time()+rand(1000,9999);
        //获取文件后缀
        $ext = $file->extension();
        //拼接图片名
        $page = $temp.'.'.$ext;
        //上传文件 并且自定义名称
        $name = $file->storeAs('Goods',$page);

         //修改过后的所有值
          $goods->gname = $request->input('gname','');
          $goods->price = $request->input('price','');
          $goods->goodsNum = $request->input('goodsNum','');
          $goods->goodsinfo = $request->input('goodsinfo','');
          $goods->tid = $request->input('tid','');
          $goods->status = $request->input('status','');
          $goods->pic = $page;
         
           $res = $goods->save();
           if($res){
                    DB::commit();
                    return redirect('/admins/goodsgo/')->with('success','修改成功');
                 }else{
                    DB::rollBack();
                    return redirect('/admins/goodsgo/')->with('error','修改失败');
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
        //
        $goods = Goodsgo::find($id);
        // dump($goods);
        $pic=$goods->pic;
        //拼接图片路径
        $ret ='Goods/'.$pic;
        //删除数据库
        $res = $goods->destroy($id);
         if($res){
               //删除图片
               Storage::delete($ret);
               return redirect('/admins/goodsgo')->with('success','删除成功'); 
            }else{
               return redirect('/admins/goodsgo')->with('error','删除失败');
                }
         

        
    }
}
