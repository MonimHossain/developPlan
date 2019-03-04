<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Session;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Session::has('locale'))
        {
          $locale=session('locale');
        }
        else
            $locale='en';
        App::setLocale($locale);

        return $next($request);
    }
}
