<?php

namespace App\Http\Middleware;

use Closure;

class Admin{
    public function handle($request, Closure $next){
        if(auth()->user()->isAdmin == 1){
            return $next($request);
        }
        return redirect()->intended('/logout')->with('error','You have not admin access');
        // return redirect()->route('/')->with('error','You have not admin access');
        // return redirect('login')->with('error','You have not admin access');
    }
}
