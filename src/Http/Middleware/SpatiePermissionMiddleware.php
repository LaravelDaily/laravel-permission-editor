<?php

namespace Laraveldaily\LaravelPermissionEditor\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Schema;

class SpatiePermissionMiddleware
{
    public function handle($request, Closure $next) {
        if (!Schema::hasTable('roles') || !Schema::hasTable('permissions')) {
            throw new \Exception('Spatie Laravel Permission package is not configured: missing roles/permissions DB tables');
        }

        return $next($request);
    }
}
