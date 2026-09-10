<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MachineMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()?->role === 'mesin' && $request->user()?->status === 'approved') {
            return $next($request);
        }

        abort(403, 'Halaman ini hanya dapat diakses dari akun mesin pelayanan.');
    }
}
