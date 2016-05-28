<?php

namespace App\Http\Middleware;

use Closure;

class flogin
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
        //获取文章详情请求的地址
         $path = $_SERVER["HTTP_REFERER"]?$_SERVER["HTTP_REFERER"]:'';

        if(session('fid')){
            return $next($request);
        }else{
            $url = "/flogin".'?redirect='.$path;
            return redirect($url)->with('error','请先登录');
        }
       
    }
}
