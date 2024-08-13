<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminLoginMiddleware
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
            
            if (isset($cookies['usertype'])) {
                if ($cookies['usertype'] === 'customer') {
                    // Redirect customer to main.index
                    return redirect()->route('main.index');
                } elseif ($cookies['usertype'] === 'incharge') {
                    // Redirect incharge to incharge.index
                    return redirect()->route('incharge.index');
                }
            }
            return $next($request);
            // Redirect to the main index if the user is not an admin or the necessary cookies are missing
            
    }
}
