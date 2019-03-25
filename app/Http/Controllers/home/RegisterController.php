<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Userinfo;
use App\Models\Users;
use Hash;
use DB;
use App\Models\Goodsgo;

class RegisterController extends Controller
	{
	    //进入注册页面
	    public function index()
	    {
	    	return view('home.register.register');
	    }

	    //将注册页面内容的值导入数据库
	  	public function show(Request $request)
	  	{
	  		  DB::beginTransaction();
	  		//判断验证码
	  		if(session('rand_cond') !=  $request->smscode){

	  			 echo "<script>alert('验证码错误');location.href='/home/register?p=register';</script>";
	  		}else{
	  	 
	  			if($request->has('agree')){
	  			$user = new Users;
	  			$user->name = $request->name;
	  			 $user->phone =  $request->phone;
	  			 $user->password = Hash::make($request->password);
	  			 $res = $user->save();
	  			 
	  			 if($res){
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

	  	//手机验证发送验证码
	  	public function yanzhen(Request $request)
	  	{
	  		$phone = $request->phone;
	  		$rand_cond = rand(1111,9999);
	  		session(['rand_cond' => $rand_cond]);
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
				
				return view('home.udai.udai_welcome');
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
		

	}
