<?php

namespace App\Http\Requests;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!$user || $user->role !== 'admin') {
            return  response()->json([
                "message" => "Forbidden for you"
            ],403);
        }

        return $next($request);
    }
}
