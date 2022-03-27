<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class IsAgreementFilled
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->agreement === null && !Auth::user()->has_agreement_signed) {
            return redirect()->route('agreement.create');
        }
        return $next($request);
    }
}
