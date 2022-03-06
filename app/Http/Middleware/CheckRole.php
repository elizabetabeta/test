<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();
        if ($user->hasRole($role)) {
            return $next($request);
        }
        abort (403, "Nemate pravo pristupa ovom dijelu sustava!");
    }
}

?>
