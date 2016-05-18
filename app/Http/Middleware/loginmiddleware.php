<?php

namespace App\Http\Middleware;

use Closure;

class loginmiddleware
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
        if(session('id')){
             return $next($request);
        }else{
            return redirect('/admins/login')->with('error','请先登录');
        }
    }
}
