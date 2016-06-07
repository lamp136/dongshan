<?php

namespace App\Http\Middleware;

use Closure;
use \App\User;
class authmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取当前的url地址
        $url = $request->path();
        // dd($url);
        // 获取登录的用户
        $user = User::find(session('id'));

        //检测登录用户的角色
        $res = '';
        if($user->hasRole('goods')){
            $res = 'goods';
        }
        if($user->hasRole('article')){
            $res = 'article';
        }
        if($user->hasRole('images')){
            $res = 'images';
        }
        
        session(['res'=>$res]);
        // dd(session()->all());
        //检测当前登录的用户是否有对当前页面的操作权限
        if(!$user->may($url)){
            abort(403);
        }
        return $next($request);
    }
}
