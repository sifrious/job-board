<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', 'https://slack.com/oauth/v2/authorize');
    }
}

// class Cors
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         $response = $next($request);
        
//         $response->header('Access-Control-Allow-Origin', env('ALLOWED_ORIGIN', 'https://slack.com/oauth/v2/authorize'))
//             ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
//             ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');
        
//         return $response;
//     }
// }
