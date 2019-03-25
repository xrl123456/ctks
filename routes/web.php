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

Route::get('/', function () {
    return view('welcome');
});

	// 登录页面控制
	Route::get('/admins');



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
	//商品添加路由
	Route::resource('/admins/goodsgo','admin\GoodsgoController');



	//前台首页路由
	Route::resource('/home/index','home\IndexController');
	//跳转注册页面路由
	Route::get('/home/register','home\RegisterController@index');
	//跳转注册方法路由
	Route::post('/home/rest','home\RegisterController@show');
	//跳转验证路由
	Route::get('/home/yanzhen','home\RegisterController@yanzhen');
	//跳转登录路由
	Route::get('/home/denlu','home\RegisterController@denlu');
	//跳转前台用户中心
	Route::get('/home/udai','home\RegisterController@welcome');
	//跳转前台个人资料区
	Route::get('/home/setting','home\RegisterController@setting');
	//跳转前台个人资料存储
	Route::post('/home/datum','home\RegisterController@datum');
	// Route::get('/home/bbs','home\BbsController@Bbs');
	Route::get('/home/bbs/index/{id}','home\BbsController@index');
	//Route::get('/home/lbts/index','home\LbtsController@index');
	Route::resource('/admins/guanli','admin\GuanliController');
	










	// 管理员模块
	Route::post('/admins/super/showup/{id}','admin\SuperController@showup');
	Route::post('/admins/super/imgup/{id}','admin\SuperController@imgup');
	Route::resource('/admins/super','admin\SuperController');
	
	
	Route::resource('/admins/users','admin\UsersController');
	Route::get('/admins/lbts/{id}/{statu}','admin\LbtsController@statu');
	Route::resource('/admins/lbts','admin\LbtsController');
	Route::resource('/admins/guanli','admin\GuanliController');