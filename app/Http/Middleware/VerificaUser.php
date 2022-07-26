<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class VerificaUser
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
        
        $tipo = Auth::user()->userDados->tipo;

        if ($tipo != 'admin') {
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    
    }
}
