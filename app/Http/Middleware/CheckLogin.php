<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $res=session('user');
        // dd($res);
        if (!$res) {
            return redirect('cargo/login');
        }

        return $next($request);
    }
}
