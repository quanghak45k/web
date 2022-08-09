<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsVerifyEmailAndActive
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
        if (!Auth::user()->is_email_verified) {

            auth()->logout();
            return redirect()->route('user.login')
                ->with('message', 'You need to confirm your account.please check your email.');
        }
        if (!Auth::user()->active) {

            auth()->logout();
            return redirect()->route('user.login')
                ->with('message', 'you account is blocked.');
        }

        return $next($request);
    }
}
