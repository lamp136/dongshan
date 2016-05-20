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



//前台注册页面
Route::get('/register','logincontroller@register');

//前台注册操作
Route::post('/register','logincontroller@doregister');

//前台登录
Route::get('/flogin','logincontroller@flogin');

//密码找回页面
Route::get('/forget','logincontroller@forget');

//密码找回操作发邮件
Route::post('/forget','logincontroller@doforget');

//找回密码验证页面
Route::get('/yanzheng','logincontroller@yanzheng');

//密码重置
Route::post('/reset','logincontroller@reset');



//激活操作
Route::get('/jihuo','logincontroller@jihuo');

//验证码
Route::get('/vcode','commoncontroller@createvcode');


//测试路由
 Route::get('/test','testcontroller@test');