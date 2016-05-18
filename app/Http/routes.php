<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
     return view('welcome');
   
});

//路由组限制登录
Route::group(['middleware'=>'login'],function(){
	 //后台路由规则
	 Route::get('/admins','admincontroller@index');

	 //后台用户管理
	 Route::controller('admins/user','usercontroller');

	 //后台商品分类 管理
	 Route::controller('admins/fenlei','fenleicontroller');

	//后台的文章管理
	Route::controller('admins/article','articlecontroller');

});
//后台登录页面
Route::get('/admins/login','logincontroller@login');

//后台登录操作
Route::post('/admins/dologin','logincontroller@dologin');