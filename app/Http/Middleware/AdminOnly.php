<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
 //use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(auth()->user()?->email !== 'jsolomon11@bcit.ca') {
        //     abort(Response::HTTP_FORBIDDEN);
        // }
        $user = $request->user();
        if(!$user?->isAdmin()) {
            abort(Response::HTTP_FORBIDDEN);
        }    

        return $next($request);
    }
}
