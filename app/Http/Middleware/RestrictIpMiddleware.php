<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictIpMiddleware
{
    /**
     * The IP addresses that are allowed.
     *
     * @var array
     */
    protected $allowedIps = [
        // You can leave this array empty to allow all IPs
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        // Log the IP address for debugging purposes
        \Log::info('Request IP:', ['ip' => $ip]);

        // Allow all IPs by bypassing the IP check
        return $next($request);
    }
}
