<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Language
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
        //kiem tra nếu tồn tại Session language
        if(Session::has('language')){
            app()->setlocale(Session::get('language'));
        }
        return $next($request);
    }
}
