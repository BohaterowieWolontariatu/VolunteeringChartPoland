<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CheckIfUserActive
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Inertia\Response|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()->is_active) {
            return Inertia::render('Blocked');
        }
        return $next($request);
    }
}
