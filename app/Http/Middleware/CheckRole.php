<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

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
      //$userRol = User::All();

      if($request->user()->isAdmin())
      {
        return $next($request);
        // return view('adminPages/adminWelcome');
      }
      return redirect('/');
    }
}
