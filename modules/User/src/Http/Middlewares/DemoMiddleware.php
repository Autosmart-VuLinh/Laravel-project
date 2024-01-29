<?php

namespace Modules\User\src\Http\Middlewares;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DemoMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        echo "Xin chào";
        return $next($request);
    }
}
