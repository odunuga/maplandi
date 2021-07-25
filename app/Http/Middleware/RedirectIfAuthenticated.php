<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $to = RouteServiceProvider::HOME;
                if (auth('admin')->check()) $to = RouteServiceProvider::ADMIN;
                $check_session = Cache::has('redirect_to'); // check if redirect page is set
                if ($check_session) {
                    $to = Cache::get('redirect_to'); // take user to redirect page
                    Cache::forget('redirect_to');
                }

                return redirect()->route($to);
            }
        }

        return $next($request);
    }
}
