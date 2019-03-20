<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
use DB;

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

			public function denlu()
			{
				return view('home.register.denlu');
			}

	 }
