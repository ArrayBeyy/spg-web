<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BranchMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    if (auth()->check()) {
        $branchId = session('branch_id');

        if (!$branchId) {
            $branchId = auth()->user()->branch_id;
            session(['branch_id' => $branchId]);
        }
    }

    return $next($request);
}
}
