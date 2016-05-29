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

//测试路由
 Route::get('/test',function(){
 	return view('moban.qiantai');
 });


Route::get('/', function () {
     return view('welcome');
   
});

//路由组限制登录
Route::group(['middleware'=>'login'],function(){
	 //后台路由规则
	 Route::get('/admins','admincontroller@index');

	 //后台用户管理
	 Route::controller('admins/user','usercontroller');

	 //后台文章分类 管理
	 Route::controller('admins/fenlei','fenleicontroller');

	//后台的文章管理
	Route::controller('admins/article','articlecontroller');

	//后台商品分类
	Route::controller('admins/cate','goodscatecontroller');

	//后台商品管理
	 Route::controller('admins/goods','goodscontroller');


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

//前台登录操作
Route::post('/flogin','logincontroller@doflogin');

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


//文章详情路由
Route::get('/post/{id}','articlecontroller@show');

//文章的列表路由
Route::get('/list','articlecontroller@listshow');

//评论路由
Route::post('/comment/insert','commentcontroller@insert')->middleware('flogin');


//商品的详情路由
Route::get('/goods/{id}','goodscontroller@show');

//商品列表路由
Route::get('/shop/list','goodscontroller@listshow');

//限制没登录的用户
Route::group(['middleware'=>'flogin'],function(){

	//加入购物车路由
	Route::post('/cart/insert','cartcontroller@insert');

	//购物车页面
	Route::get('/cart/index','cartcontroller@index');

	//删除购物车里商品路由
	Route::get('/cart/delete','cartcontroller@delete');

	//订单显示页路由
	Route::any('/order/insert','ordercontroller@insert');

	//添加地址路由
	Route::post('/address/insert','addresscontroller@insert');

	//订单表的创建
	Route::post('/order/create','ordercontroller@create');

});
//清除session测试
Route::get('/clear','cartcontroller@clear');
