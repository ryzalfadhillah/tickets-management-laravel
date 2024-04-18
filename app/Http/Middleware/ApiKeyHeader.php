<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKeyHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('X-API-KEY')) {
            $apiKey = $request->header('X-API-KEY');
            if ($apiKey != config('headers.api_key')) {
                return response()->json(['error' => 'Invalid API Key'], 401);
            }
        } else {
            return response()->json(['error' => 'API Key not provided'], 401);
        }
        return $next($request);
    }
}
