<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;
use App\Models\Role;
class IsAdmin
{

    public function handle($request, Closure $next)
    {

       if (Auth::user() ||  Auth::user()->role_id == 1 ||  Auth::user()->role_id == 2) {

        return $next($request);
    }
    return redirect('/');
}
}
