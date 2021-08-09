<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('LoggedAdmin')){
            return redirect('admin/login')->with('message', 'Admin must be logged in');
        }
        return $next($request);
    }
}
