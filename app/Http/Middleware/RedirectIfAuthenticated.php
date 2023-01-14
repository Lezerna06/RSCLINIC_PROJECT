<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $routename = 'user.dashboard';
                if (Auth::user()->restriction === 1){
                    $routename = 'admin.dashboard';
                }
                if (Auth::user()->restriction === 2){
                    $routename = 'doctor.dashboard';
                }
                return redirect()->route($routename);
            }
        }

        return $next($request);


        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         $routeName = 'user.index';
        //         if (Auth::user()->user_type == 'admin')
        //             $routeName = 'admin.dashboard';
        //         return redirect()->route($routeName);
        //     }
        // }

        // return $next($request);
    }
}
