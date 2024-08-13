<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllAccessMiddleware
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
        
        if (isset($cookies['usertype']) && ($cookies['usertype'] === 'admin' || $cookies['usertype'] === 'incharge')) {
             // User is an admin, allow access
            return redirect()->route('admin.badrequest');
        }
        return $next($request);
        // Redirect to the main index if the user is not an admin or the necessary cookies are missing
    }
}
