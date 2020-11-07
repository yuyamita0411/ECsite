<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Mypagemiddleware
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
        $mergedata = [
            'username' => '三田雄也',
            'password' => 'rinel0411',
            'age' => 28
        ];
        $request->merge(['mergedata' => $mergedata]);
        return $next($request);
    }
}
