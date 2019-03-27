<?php

namespace App\Http\Middleware;

use Closure;

class AdminloginMiddleware
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
        // 检测session 里面 后台 admins 有没有值
        // if(session('admins_login')){
        if ($request->session()->exists('admin_user')) {
          
            return $next($request);

        }else{

            // 没通过  没有值 那么就去登录页面 给session 赋值
            return redirect('admins/login');
        }

        

    }
}
