<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AdminAccess extends Middleware
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('control.login');
        }
    }
}
