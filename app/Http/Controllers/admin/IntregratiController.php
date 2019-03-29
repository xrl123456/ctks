<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Integrals;
use  App\Models\Goodsgo;
use DB;
use App\Models\Users;
class IntregratiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $integ = Integrals::all();
                  $i=1;

       return view("admin.intregrati.index",['integ'=>$integ ,'i'=>$i]);
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
        
          echo '2';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $integ = Integrals::find($id);
         if($integ->status == 0){
            $integ->status =1;
            $res = $integ->save();
            if($res){
                return '<script>alert("成功发货");location.href="/admins/integrati";</script>';
            }else{
                return '<script>alert("发货失败");location.href="/admins/integrati";</script>';
            }
         }else{
            echo '2';
         }
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        //订单详情
    public function edit($id)
    {
            
            $integ = Integrals::find($id);
            //地址id
             $aid = $integ->aid;

        return view("admin.intregrati.intreg",['integ'=>$integ]);
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
