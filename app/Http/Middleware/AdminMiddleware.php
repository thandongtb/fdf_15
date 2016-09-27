<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        if (Auth::check()) {
            return redirect()->to(action('Home\HomeController@index'))->withErrors([trans('error.access_denied')]);
        }

        return redirect()->to(config('url.login'))->withErrors([trans('error.access_denied')]);
    }
}
