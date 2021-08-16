<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsActive
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

        if(auth()->user()->status == 'active'){
            return $next($request);
        }else{
            auth()->logout();
            set_message('danger','your status not active');
            return redirect()->back();
        }


    }
}
