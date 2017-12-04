<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Http\Kernel;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard=null)
    {
       
        if(Auth::guard($guard)->check()){
           
         return redirect('/login');
        }
        return $next($request);
        
    }
}
