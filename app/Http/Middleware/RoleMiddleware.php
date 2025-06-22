<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ?string $role = null): Response
    {
        // // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // // Get logged-in user
        $user = Auth::user();

        // // Check if user has the required role
        if ($user->role !== $role) {
            dd('User role: ' . $user->role . ' does not match required role: ' . $role);
            return redirect('/')->with('error', 'Unauthorized access.');
        }
        // if ($role === 'admin' && !$user->isAdmin()) {
        //     abort(403, 'Unauthorized.');
        // }

        // if ($role === 'firm_admin' && !$user->isFirmAdmin()) {
        //     abort(403, 'Unauthorized.');
        // }

        // if ($role === 'firm_user' && !$user->isFirmUser()) {
        //     abort(403, 'Unauthorized.');
        // }

        
        // if (!$role || !auth()->check() || auth()->user()->role !== $role) {
        //     abort(403, 'Unauthorized');
        // }
    
        
        return $next($request);
    }
}
