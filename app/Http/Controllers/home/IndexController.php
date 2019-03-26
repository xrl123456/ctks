<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goodsgo;
use App\Models\Userinfo;
use App\Models\Users;
class IndexController extends Controller
{


    public static function getFlei($pid = 0)
    {
        $data = [];
        //��ȡһ������
        $yiji_data = Goods::where('pid',$pid)->get();

        //通过一级分类 获取二级分类
        foreach($yiji_data as $key => $value) {
           $temp = self::getFlei($value->id);
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

            //��ѯ������Ʒ��Ϣ
            $goods = Goodsgo::all();
              $i=1;
              $c=1;
            //ǩ������
            $id =(Session('home_user')['id']);
            $infoadd = Userinfo::where('uid',$id)->get();
            $users = Users::find($id);

         
             
        return view('home.index.index',['goods'=>$goods,'i'=>$i,'c'=>$c,'users'=>$users,'infoadd'=>$infoadd]);
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
        // 这里目前是退出的
        session()->forget('home_user');
        return '<script>alert("退出成功,");location.href="/";</script>';
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
