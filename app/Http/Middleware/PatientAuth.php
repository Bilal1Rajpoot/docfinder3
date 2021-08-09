<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PatientAuth
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
        if(!session()->has('LoggedPatient')){
            return redirect('patient/login')->with('message', 'You must be logged in');
        }
        return $next($request);
    }
}
