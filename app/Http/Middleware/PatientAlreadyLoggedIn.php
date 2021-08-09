<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PatientAlreadyLoggedIn
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
        if(session()->has('LoggedPatient') && ((url('patient/login')) == $request->url() || (url('patient/registration')) == $request->url() ))
        {
            return back();
        }
        return $next($request);
    }
}
