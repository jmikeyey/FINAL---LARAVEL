<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve all cookies
        $cookies = $request->cookies->all();
        
        if (isset($cookies['usertype']) && $cookies['usertype'] === 'customer') {
            return $next($request); // User is an admin, allow access
        }
        
        // Redirect to the main index if the user is not an admin or the necessary cookies are missing
        return redirect()->route('main.badrequest');
        
    }
}
