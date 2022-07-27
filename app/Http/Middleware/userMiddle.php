<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class userMiddle
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
            if(Auth::user()->role=="user")
                return $next($request);
        }
        if(Auth::guest())
        {
            return redirect('/login')->with('warning', 'User Login required for Checkout! Please Login with User Account!');
        }

        return redirect('/home')->with('warning' , 'You are signed in as Admin! Please Login with User Account!');

    }
}
