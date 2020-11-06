<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MypageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $success = [
            'success' => 'ログインに成功しました。'
        ];
        $fail = [
            'fail' => 'ログインに失敗しました。'
        ];
        $request->merge(['success' => $success]);
        $request->merge(['fail' => $fail]);
        $content = $next($request);
        return $content;
    }
}
