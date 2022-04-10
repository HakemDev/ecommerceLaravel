<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Iadmin
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
        if(auth()->guest())
           {
            return redirect()->route('home')->with(['errorLink'=>"Vous n'étez pas autorise d'accédes a ce site"]);;
 
           }
        $user=Auth::user()->status;
        if(!$user)
           {
               return redirect()->route('home')->with(['errorLink'=>"Vous n'étez pas autorise d'accédes a ce site"]);;
               
           }
           return $next($request);
        
       
    }
}
