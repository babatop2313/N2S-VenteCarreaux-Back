<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $session_value = $request->session()->get('the_user');

        if ($session_value != null ) {
            $value = $session_value[0]->profil;
      
            if ($value != "admin" && $value != "personnel") {
             
                return redirect('sign-in')->with('un_authorize', 'un_authorize');
            }
        }else {
            return redirect('sign-in')->with('un_authorize', 'un_authorize');
        }

        return $next($request);
    }
}
