<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MypageMiddleware2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = [
            ['name' => 'Middleware友達1', 'mail' => 'friend1@gmail.com'],
            ['name' => 'Middleware友達2', 'mail' => 'friend2@gmail.com'],
            ['name' => 'Middleware友達3', 'mail' => 'friend3@gmail.com']
        ];

        /*$response = $next($request);*/

        $request->merge(['data' => $data]);
        return $next($request);
    }
}
