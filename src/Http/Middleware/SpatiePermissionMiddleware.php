<?php

namespace Laraveldaily\LaravelPermissionEditor\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Schema;

class SpatiePermissionMiddleware
{
    public function handle($request, Closure $next) {
        $tableNames = config('permission.table_names');
        
        if (!Schema::hasTable($tableNames['roles']) || !Schema::hasTable($tableNames['permissions'])) {
            throw new \Exception('Spatie Laravel Permission package is not configured: missing roles/permissions DB tables');
        }

        return $next($request);
    }
}
