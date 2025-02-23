<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next, int $role)
    {
        if (!$request->user()) {
        return redirect('/login')->with('error', 'Veuillez vous connecter.');
    }
        if ($request->user()->role_id !== $role) {
            return redirect('/')->with('error', 'Accès refusé.');
        }
        return $next($request);
    }
}
