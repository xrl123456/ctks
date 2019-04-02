<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use DB;
use App\Http\Requests\GoodsleStoreRequest;
class GoodsController extends Controller
{
   // public $count;
    
    // //封装
    // public static function getCates()
    //     {
    //       // 按照次顺序查询
    //        // $data = DB::select("select * ,concat(path,',',id)as paths from goods_type order by paths");
    //        //模型的写法
    //        $data = Goods::select('*',DB::raw('concat(path,",",id)as paths'))->orderBy('paths','asc')->paginate($count);

    //        foreach($data as $k=>$v ){
    //             // echo $v->path.'<br/>';
    //             //统计","出现的次数
    //              $n = substr_count($v->path,',');
    //              //拼接
    //              $data[$k]->cname = str_repeat('|-----',$n).$v->cname;
    //            }

    //         //返回值
    //         return $data;

    // }
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //显示操作
    public function index(Request $request)
    {
        
                // dump($request->all());exit;
            //获取总条数
            $total = Goods::count();
            
         

          //搜索的关键字
            $cname = $request->input('cname',''); 
            // $users = Users::->paginate($count);
          $data = Goods::where('cname','like','%'.$cname.'%')->select('*',DB::raw('concat(path,",",id)as paths'))->orderBy('paths','asc')->get();

           foreach($data as $k=>$v ){
                // echo $v->path.'<br/>';
                //统计","出现的次数
                 $n = substr_count($v->path,',');
                 //拼接
                 $data[$k]->cname = str_repeat('|-----',$n).$v->cname;
               }
          
        //进入显示页面
       return view('admin.goods.index',['data'=>$data,'total'=>$total]);
    }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        //添加操作
    public function create(Request $request)
    {

        //获取添加子分类的ID
        $id = $request->input('id','');
        //获取数据
        $data = Goods::all();
        //获取总数据
          // $count  = $request->input('count',5);

          $data = Goods::select('*',DB::raw('concat(path,",",id)as paths'))->orderBy('paths','asc')->get();

           foreach($data as $k=>$v ){
                // echo $v->path.'<br/>';
                //统计","出现的次数
                 $n = substr_count($v->path,',');
                 //拼接
                 $data[$k]->cname = str_repeat('|-----',$n).$v->cname;
               }
        //进入添加页面
        return view('admin.goods.create',[ 'data'=>$data,'id' => $id]);
    }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        //添加到数据库里
    public function store(GoodsleStoreRequest $request)
    {
       
         /*
            开启事务   DB::beginTransaction();
            提交事务   DB::commit()
            回滚事务   DB::rollBack()
         */
        // $a=$request->all();
        // dump($a);exit;
       DB::beginTransaction();
        //初始化数据库
       $goods = new Goods;
       //获取传送过来的值并且赋值给goods
       $goods->status = $request->input('status','');
       $goods->cname = $request->input('cname','');
       $goods->pid = $request->input('pid','');

       //处理path
       if($request->input('pid')==0){
                $goods->path = 0;
            }else{
                //获取父级分类的数据
                $path = Goods::find($request->input('pid'));
                //父级分类的数据
                $goods->path = $path->path.','.$path->id;
            }

        //插入数据库
        $res = $goods->save();
        //判断是否添加成功
        if($res){
              DB::commit();
            return redirect('/admins/goods')->with('success','添加成功');
        }else{
            DB::rollBack();
            return redirect('/admins/goods')->with('error','添加失败');
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
         echo '1';
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
       $goods = Goods::where('pid',$id)->first();

        if($goods) {
            return back()->with('error','还有子分类,不能删除');
            
        }
         if(Goods::destroy($id)) {
            return redirect('/admins/goods')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
