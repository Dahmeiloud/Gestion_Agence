<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->usertype == 'admin')
        {
            return $next($request);
        }
        else
        {
            return redirect('/home')->with('status',' You are Not Allowen To Admin Dashbord ');
        }

    }
}
