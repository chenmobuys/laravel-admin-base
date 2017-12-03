<?php

namespace Chenmobuys\AdminBase\Middleware;

use Illuminate\Http\Request;

class Bootstrap
{
    public function handle(Request $request, \Closure $next)
    {
        if (file_exists($bootstrap = __DIR__.'/../bootstrap.php')) {
            require $bootstrap;
        }

        return $next($request);
    }
}
