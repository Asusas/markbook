<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Session;

class CheckRole
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

        if (auth()->user()->admin == 1) {
            return $next($request);
        }
        Session::flash('error', 'Sio puslapio perziurai jums reikia administratoriaus leidimo!');
        return redirect('/');

    }
}