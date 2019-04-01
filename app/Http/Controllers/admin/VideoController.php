<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Http\Requests\VideoStroeRequest;
use DB;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $i=1;
            $video = Video::all();
         return view('admin.video.index',['video'=>$video,'i'=>$i]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.video.video');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoStroeRequest $request)
    {
        if($request->hasFile('audio') && $request->hasFile('pic')) {
            // 视频
            $file = $request->file('audio'); // 获取上传的文件
              // 文件原名
                $name = $file->getClientOriginalName();
                  //上传文件 并且自定义名称
                $file->storeAs('Video', $name);
            // 图片
             $pic = $request->file('pic');
             //处理文件上传名称
            $temp = time()+rand(1000,9999);
                    //获取文件后缀
                $suffix = $pic->extension();
                //拼接图片名
                $picname = $temp.'.'.$suffix;
                  $pic->storeAs('Videopic',$picname);
                 //初始化数据库
                $video = new Video;
                $video->audio =  $name;
                $video->pic = $picname;
                $video->vname = $request->input('vname',''); 
                $video->status = $request->input('status','');
                     //插入数据库
                    $res = $video->save();
                    if($res){
                         return '<script>alert("文件上传成功");location.href="/admins/video";</script>';
                    }else{
                        return '<script>alert("文件上传失败");location.href="/admins/video/create";</script>';
                    }

            }else{
                return '<script>alert("文件上传失败");location.href="/admins/video/create";</script>';
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
        // echo '1';
             $video = Video::find($id);
             // return view()
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
         DB::beginTransaction();
      $res = Video::destroy($id);
       if($res){
            DB::commit();
            return redirect('/admins/video')->with('success','删除成功');
        }else{
            DB::rollBack();
            return redirect('/admins/video')->with('error','删除失败');
        }

    }
}
