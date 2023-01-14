<?php

namespace App\Http\Middleware\userType;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Patient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->expectsJson() && !Auth::check()) {
            return response()->json([
                'error' => 'Unauthenticated.'
            ], 401);
        }
        
        if (!Auth::check()) {
            return redirect()->route('index');
        }
        
        if (Auth::user()->restriction === 3) {
            return $next($request);
        }

        if (Auth::user()->restriction === 1) {
            return redirect()->route('admin.dashboard');
        }
        
        if (Auth::user()->restriction === 2) {
            return redirect()->route('doctor.dashboard');
        }
    }
}
