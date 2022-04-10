<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $user=Auth::user()->status;
        if($user)
           {
               return redirect()->route('home')->with(['errorLink'=>"Vous étez admin vous ne pouvez pas acheter du produit"]);;
               
           }
           return $next($request);
    }
}
