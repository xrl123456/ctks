<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Userinfo;
use App\Models\Users;
use Hash;
use DB;
use App\Models\Goodsgo;
 use App\Http\Requests\home\RegisStoreRequest;
use App\Models\Orders;
use App\Models\Order_info;
use App\Models\Address;

class RegisterController extends Controller
	{
	    //进入注册页面
	    public function index()
	    {
	    	return view('home.register.register');
	    }

	    //将注册页面内容的值导入数据库
	  	public function show(RegisStoreRequest $request)
	  	{
	  		  DB::beginTransaction();
	  		//判断验证码
	  		if(session('rand_cond') !=  $request->smscode){

	  			 echo "<script>alert('验证码错误');location.href='/home/register?p=register';</script>";
	  		}else{
	  			if( session('rand_phone') != $request->phone ){
	  				echo "<script>alert('号码不一致');location.href='/home/register?p=register';</script>";
	  			}else{
	  	 
	  			if($request->has('agree')){
	  			$user = new Users;
	  			$user->name = $request->input('name','');
	  			 $user->phone =$request->input('phone','');
	  			 $user->password = Hash::make($request->password);
	  			 $res = $user->save();
	  			  $uid = $user->id;
	  			 $info = new Userinfo;
	  			 $info->uid=$uid;
	  			  $res2 = $info->save();
	  			 if($res && $res2){
	  			 		 DB::commit();
	  			 		  echo "<script>alert('注册成功');location.href='/home/denlu';</script>";
	  			 	}else{
	  			 		DB::rollBack();
	  			 		 echo "<script>alert('注册失败');location.href='/home/register?p=register';</script>";
	  			 	}

	  			}else{
	  			 echo "<script>alert('请阅读协议');location.href='/home/register?p=register';</script>";
	  				
	  				}
	  			}
	  		 }
	  	}
	  	//修改密码
	  	public function amend(Request $request)
		{
			// 判断验证码
			if(session('rand_cond') != $request->smscode){

			  			 echo "<script>alert('验证码错误');location.href='/home/denlu';</script>";
			  		}else{
			  			
			  			if(session('rand_phone') != $request->phone ){
			  				echo "<script>alert('号码不一致');location.href='/home/denlu';</script>";
			  				}else{

			  			  $phone = $request->phone;
			  			 $user = DB::select('select * from users where phone = ?', [$phone]);
			  			 		// 判断是否注册过
				  			if($user){
				  				 $id = $user[0]->id;
				  				$password = Hash::make($request->password);
				  				 $res = DB::table('users')->where('id', $id)->update(['password' =>$password]);
				  				 // 判断是否修改成功
				  				if($res){
							  		 echo "<script>alert('修改成功');location.href='/home/denlu';</script>";
							  		}else{
							  		 echo "<script>alert('修改失败');location.href='/home/denlu';</script>";
							  			 }
							 
				  			}else{
				  				echo "<script>alert('用户不存在');location.href='/home/register?p=register';</script>";
			  			}

			  		}
	  			}
	  	 
		}
		



	  	//手机验证发送验证码
	  	public function yanzhen(Request $request)
	  	{
	  		$phone = $request->phone;
	  		$rand_cond = rand(1111,9999);
	  		session(['rand_cond' => $rand_cond]);
	  		session(['rand_phone' => $phone]);

			$url = "http://v.juhe.cn/sms/send";
			$params = array(
	    	'key' => 'd869e738c09771abbeaa6e8938dfbabb', //您申请的APPKEY
	    	'mobile' => $phone, //接受短信的用户手机号码
	    	'tpl_id' => '144307', //您申请的短信模板ID，根据实际情况修改
	    	'tpl_value' =>'#code#='.$rand_cond //您设置的模板变量，根据实际情况修改
			);
				$paramstring = http_build_query($params);
				$content = self::juheCurl($url, $paramstring);
				
				if ($content) {
				    var_dump($content);
				} else {
				    //请求异常
				}
	  	}


			  /**
			 * 请求接口返回内容
			 * @param  string $url [请求的URL地址]
			 * @param  string $params [请求的参数]
			 * @param  int $ipost [是否采用POST形式]
			 * @return  string
			 */
			
			  public static function juheCurl($url, $params = false, $ispost = 0)
			{
			    $httpInfo = array();
			    $ch = curl_init();

			    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			    curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
			    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
			    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			    if ($ispost) {
			        curl_setopt($ch, CURLOPT_POST, true);
			        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
			        curl_setopt($ch, CURLOPT_URL, $url);
			    } else {
			        if ($params) {
			            curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
			        } else {
			            curl_setopt($ch, CURLOPT_URL, $url);
			        }
			    }
			    $response = curl_exec($ch);
			    if ($response === FALSE) {
			        //echo "cURL Error: " . curl_error($ch);
			        return false;
			    }
			    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			    $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
			    curl_close($ch);
			    return $response;
			} 
			//登录
			public function denlu()
			{
				return view('home.register.denlu');
			}
			//用户中心
			public function welcome()
			{
				// 个人中心首页显示 订单

				
				$id =(Session('home_user')['id']);
				 $info = Users::find($id);
				

			

				// 显示订单
				$uid = (session('home_user')['id']);
		        $addres = DB::table('address')->where('uid',$uid)->get();
		       
		        $total = new Orders;
		        $testshop = $total->where('uid','=',$uid)->orderBy('id','desc')->get();
		        $newshop = $total->where('uid','=',$uid)->where('status','0')->orderBy('id','desc')->get();
		        $shop1 = $total->where('uid','=',$uid)->where('status','1')->orderBy('id','desc')->get();
		        $shop2 = $total->where('uid','=',$uid)->where('status','2')->orderBy('id','desc')->get();
		        $shop3 = $total->where('uid','=',$uid)->where('status','3')->orderBy('id','desc')->get();
		        // dd($newshop);
		        
				$i = 1;
				$or =0;

				return view('home.udai.udai_welcome',['info'=>$info,'testshop'=>$testshop,'newshop'=>$newshop,'shop1'=>$shop1,'shop2'=>$shop2,'shop3'=>$shop3]);

			}
			//个人资料
			public function setting()
			{	
				$id =(Session('home_user')['id']);
				 $info = Users::find($id);

				return view('home.udai.udai_setting',['info'=>$info]);
			}
			//个人资料存储
			public function datum(Request $request)
			{
							$id =(Session('home_user')['id']);
							 $info = Users::find($id);
							//ajx传递过来的键值
						 $file = $request->file('abc');
						 if($file){
							 	//图片保存的路径
							 $name = $file->store('photo');
							 $aa = '/uploads/'.$name;
							 $info->pic= $aa;
							 if($info->save()){
							 	//返回到显示页面
							 	return $name;
							 }
						}else{

        				 //初始化数据库
        				
        				 //获取值
        				 $info ->name = $request->input('name','');
        				 $info ->status = $request->input('status','');
        				 $info->sex = $request->input('sex','');
        				 $info->birth = $request->input('birth','');
        				 $res = $info ->save();
        				 
	        				  if($res){
	        				  	 echo "<script>alert('添加成功');location.href='/home/udai';</script>";
	        				  	}else{
	        				  		echo "<script>alert('添加失败');location.href='/home/setting';</script>";
	        				  	}
	        			}

			}
			//签到操作
			public function userget(Request $request)
			{	
				//签到天数
				$add = $request->add;
				//总积分
				$badge = $request->badge;
				//添加的积分
				$intr =$request->inte;
				//用户id
				$id =(Session('home_user')['id']);
				//用户数据库
				$info = new Userinfo;
				//查询修改时间
				 $update = $info->where('uid',$id)->get();

				 //获取修改时间
				 $at = $update[0]->birth;
				  //  3-30
				  
				 //当天时间
				 $ee = date('Y-m-d');
				
				 //连续签到当天的前一天
				 $previous = (date("Y-m-d",strtotime("-1 day")));
				 //总积分
				 $desc =$badge+$intr;
				 if($at>=$ee){
				 	// 修改时间大于或者等于当天时间者不返回
				 }else{
				 	//判断是否是连续签到
				 	// //  
				 	if($at == $previous ){
				 		//连续签到
				 		$add+=1;
						$res= $info->where('uid',$id)->update(['addr'=>$add,'desc'=> $desc,'birth'=>$ee]);
				 			if($res){
					 		 return $add;
					 			}
				 		}else{
				 			//不是连续签到
					 		$add=1;
					 		$res= $info->where('uid',$id)->update(['addr'=>$add,'desc'=> $desc,'birth'=>$ee]);
					 		if($res){
					 		 return $add;
					 			}
					 	}
				 }
			
			}


		

	}
