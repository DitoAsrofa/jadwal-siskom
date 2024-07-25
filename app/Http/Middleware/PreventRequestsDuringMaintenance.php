<?php

namespace App\Http\Middleware;

use Closure;

class PreventRequestsDuringMaintenance
{
    public function handle($request, Closure $next)
    {
        // Logika middleware Anda di sini
        return $next($request);
    }
}