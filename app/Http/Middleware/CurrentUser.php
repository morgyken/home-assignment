<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

use Illuminate\Support\Facades\Auth;

use pp\Http\Middleware\Session;

class CurrentUser
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
        $user =  User::where('email', Auth::user()->email) ->first();
            
        $role = $user->user_role;
 
        session(['user' => $user, 'role' => $role]); // have the session assigned to the users 
              
        return $next($request);
    }
}
