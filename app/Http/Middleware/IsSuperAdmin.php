<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class IsSuperAdmin
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
        $admin = Admin::Find($request->session()->get('LoggedAdmin')->id);
        if(!($admin->role == 'super admin'))
        {
            return redirect('admin/dashboard');
        }
        return $next($request);
    }
}
