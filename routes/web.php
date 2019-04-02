<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



	// 这个是登录的
	Route::resource('admins/login','admin\LoginController');


	// 邮箱验证 找回密码
	Route::get('/admins/seek/email/{id}/{token}','admin\SeekController@email');
	Route::resource('admins/seek','admin\SeekController');

	// // 登录页面控制
	// Route::get('/admins');



// 这个中间件 判断session ->admin_user                           //
Route::group(['middleware'=>'admin_login'],function(){ 


		//定义后台首页
		Route::get('/admins','admin\IndexController@index');
		//定义后台用户详情
		Route::get('/admins/xiangqing/{id}','admin\UsersController@xiangqing');
		//定义后台用户管理
		Route::resource('/admins/users','admin\UsersController');
		//定义分类商品管理
		Route::resource('/admins/goods','admin\GoodsController');
		// 友情链接
		Route::resource('/admins/links','admin\LinksController');
		//公告路由
		Route::resource('/admins/bbs','admin\BbsController');
		//bbs分类
		Route::resource('/admins/bbsfen','admin\BbsfenController');
		//商品添加路由
		Route::resource('/admins/goodsgo','admin\GoodsgoController');
		//积分兑换管理
		Route::resource('/admins/integrati','admin\IntregratiController');
		//视频管理模块
		Route::resource('/admins/video','admin\VideoController');
		// 管理员模块
		Route::post('/admins/super/status/{id}','admin\SuperController@status');
		Route::post('/admins/super/showup/{id}','admin\SuperController@showup');
		Route::post('/admins/super/imgup/{id}','admin\SuperController@imgup');
		Route::resource('/admins/super','admin\SuperController');
		// 后台 用户管理？！
		Route::resource('/admins/users','admin\UsersController');
		Route::resource('/test','home\TestController');
			//前台轮播图路由
		Route::resource('/admins/lbts','admin\LbtsController');
		//管理路由
		Route::resource('/admins/guanli','admin\GuanliController');

		// 订单管理模块
		Route::resource('/admins/order','admin\OrdersController');

		});
		



		// 这个结尾是中间件组的结尾


	//前台首页路由
	Route::resource('/','home\IndexController');
	//跳转注册页面路由
	Route::get('/home/register','home\RegisterController@index');
	//跳转注册方法路由
	Route::post('/home/rest','home\RegisterController@show');
	//跳转验证路由
	Route::get('/home/yanzhen','home\RegisterController@yanzhen');
	/// 前台 登录 路由
	Route::resource('/home/login','home\LoginController');
	Route::get('/home/denlu','home\RegisterController@denlu');
	//修改密码
	Route::get('/home/amend','home\RegisterController@amend');
	//跳转前台第三级商品
	Route::get('/home/item_categoryl/{id}','home\GoodsController@categoryl');
		//跳转前台图片详情
	Route::get('/home/item_show/{id}','home\GoodsController@itemShow');
	//跳转前台广告
	Route::get('/home/bbs/index/{id}','home\BbsController@index');
	//跳转前台视频页
	Route::get('/home/class_room','home\VideoController@index');

Route::group(['middleware'=>'home_login'],function(){ 
	//前台退出路由
	Route::get('/home/dropOut','home\LoginController@dropOut');
	//前台签到路由
	Route::get('/home/userget','home\RegisterController@userget');
	//前台积分页面
	Route::get('/home/integral','home\UdaiController@integral');
	//积分兑换
	Route::get('/home/convert/{id}','home\UdaiController@convert');
	//跳转前台用户中心
	Route::get('/home/udai','home\RegisterController@welcome');
	//跳转前台个人资料区
	Route::get('/home/setting','home\RegisterController@setting');
	//跳转前台个人资料存储
	Route::post('/home/datum','home\RegisterController@datum');
	//加入购物车
	Route::get('/home/shopcart/{id}','home\GoodsController@shopcart');
	//前台修改登录密码
	Route::resource('/home/modifypwd','home\modifypwdController');
	Route::post('/home/udai_modifypwd_step3','home\modifypwdController@modifypwdoto');
	// 收货地址 --------
    Route::resource('/home/addres','home\AddressController');
	// 购物车  
	Route::get('/home/shop/shopping/{id}/{num}/{uid}','home\ShopController@shopping');
	Route::resource('/home/shop','home\ShopController');
	// 订单
	Route::get('/home/order/number/{num}','home\OrdersController@number');
	Route::resource('/home/order','home\OrdersController');
		// 购物车的数量 更改  
   	Route::get('/home/shop/number/{num}/{id}','home\ShopController@number');
  	 // 清空购物车
	Route::get('/home/shop/out','home\ShopController@out');

	// 从购物车删除
	Route::get('/home/shop/del/{id}','home\ShopController@del');
	// 从个人中心删除
	Route::get('/home/order/del/{id}','home\OrdersController@del');
	// 从购物车结算
	Route::post('/home/order/shoppay/{id}','home\OrdersController@shoppay');
	Route::resource('/home/shop','home\ShopController');
	// 收货地址 --------
	Route::resource('/home/addres','home\AddressController');
	// 个人中心  
	Route::resource('/home/usershow','home\UsershowController');

   });

	//测试
	Route::get('/home/bbs/aaa','home\BbsController@aaa');

	


// // 邮箱验证 找回密码
// Route::get('/admins/seek/email/{id}/{token}','admin\SeekController@email');
// Route::resource('admins/seek','admin\SeekController');




















