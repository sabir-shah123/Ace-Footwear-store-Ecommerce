<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class admin
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
        if(Auth::check())
        {
            if (Auth::user()->role == "Admin")
            return $next($request);
            /*return redirect('/home')->with('warning' , 'You are signed in as Admin! Please Login with User Account');*/

        }
        return redirect('/home')->with('warning' , 'Only Admin can have access to the requested priviliges');
    }
}
