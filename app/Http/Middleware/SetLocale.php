<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        // Arabic if URL starts with /ar, otherwise English (default, no prefix)
        $locale = str_starts_with($request->getPathInfo(), '/ar') ? 'ar' : 'en';
        App::setLocale($locale);

        return $next($request);
    }
}
