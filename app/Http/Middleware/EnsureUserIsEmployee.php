<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsEmployee
{
    public function handle(Request $request, Closure $next)
    {dd('Middleware employee is working'); 
        
        if (Auth::check() && Auth::user()->role === 'employee') {
            return $next($request);
        }
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}