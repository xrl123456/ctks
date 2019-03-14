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

//定义后台首页
Route::get('/index','admin\IndexController@index');

//定义后台用户管理
Route::resource('/admins/users','admin\UsersController');


//定义分类商品管理
Route::resource('/admins/goods','admin\GoodsController');

// 友情链接
Route::resource('/admins/links','admin\LinksController');
