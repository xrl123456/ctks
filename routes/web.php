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



// 销毁 后台登录的 session
Route::get('/admins/loginout', function () {
	session()->forget('admin_user');
    return '<script>alert("退出成功,");location.href="/admins/login";</script>';

});




// 这个中间件 判断session ->admin_user
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
//商品添加路由
Route::resource('/admins/goodsgo','admin\GoodsgoController');

// 管理员模块
Route::post('/admins/super/status/{id}','admin\SuperController@status');
Route::post('/admins/super/showup/{id}','admin\SuperController@showup');
Route::post('/admins/super/imgup/{id}','admin\SuperController@imgup');
Route::resource('/admins/super','admin\SuperController');


// 后台 用户管理？！
Route::resource('/admins/users','admin\UsersController');

Route::resource('/admins/lbts','admin\LbtsController');


// 这个结尾是中间件组的结尾
});



//  实验用 路由
//  
//  remember_token
Route::get('/test', function () {



});






Route::get('/', function () {
    return view('home.index.index');
});


//前台首页路由
Route::resource('/home/index','home\IndexController');
// 前台 登录 注册 路由
Route::resource('/home/register','home\RegisterController');



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





