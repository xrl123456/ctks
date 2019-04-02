<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goodsgo;
use App\Models\Userinfo;
use App\Models\Users;
use App\Models\Bbsfen;
class IndexController extends Controller
{


    public static function getFlei($pid = 0)
    {
        $data = [];
        //一级导航
        $yiji_data = Goods::where('pid',$pid)->get();

        //二级导航
        foreach($yiji_data as $key => $value) {
           $temp = self::getFlei($value->id);
            $value['sub'] = $temp;
            $data[] = $value;
        }
        
        return $data;
    }


     public static function bbsFlei($pid = 0)
    {
        $data = [];
        //一级导航
        $erji_data = Bbsfen::where('pid',$pid)->get();

        //二级导航
        foreach($erji_data as $key => $value) {
           $temp = self::bbsFlei($value->id);
            $value['sub'] = $temp;
            $data[] = $value;
        }
        
        return $data;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       

            //查询所有商品 
            $goods = Goodsgo::all();
              $i=1;
              $c=1;
              $b=1;
           // 用户id
            $id =(Session('home_user')['id']);
            $infoadd = Userinfo::where('uid',$id)->get();
            $users = Users::find($id);
            
         
             
        return view('home.index.index',['goods'=>$goods,'b'=>$b,'i'=>$i,'c'=>$c,'users'=>$users,'infoadd'=>$infoadd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //退出登录
        session()->forget('home_user');
        return '<script>alert("退出登录");location.href="/";</script>';

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
    }
}
