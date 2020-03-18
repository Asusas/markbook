<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

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
        return redirect('/')->with('error', 'Sio puslapio perziurai jus neturite leidimo');

    }
}