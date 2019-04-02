<?php

namespace App\Http\Middleware;

use Closure;

class HomeLoginMiddleware
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
        if ($request->session()->exists('home_user')) {
          
            return $next($request);

        }else{
            
            // 没通过  没有值 那么就去登录页面 给session 赋值
            return redirect('/home/denlu');
        }

    }
}
