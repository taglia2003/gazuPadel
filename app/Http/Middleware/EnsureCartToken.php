<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EnsureCartToken
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('cart_token');
        $isNew = ! $token;
        $token ??= (string) Str::uuid();

        $request->attributes->set('cart_token', $token);

        $response = $next($request);

        if ($isNew) {
            $response->headers->setCookie(cookie('cart_token', $token, 60 * 24 * 365));
        }

        return $response;
    }
}
