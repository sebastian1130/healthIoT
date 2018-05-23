<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
echo 'hola';
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
      $userRol = User::find('rol');

      if($userRol == 1)
      {
        return $next($request);
      }
      return redirect('/');
    }
}
