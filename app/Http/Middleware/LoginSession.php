<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
		// primer enunciado
		if(auth()->user()->email_verified_at === NULL | auth()->user()->email_verified_at === ''){
			return redirect('/verificacion');
		}
		// segundo enunciado campo para validar la ultima sesion se llamara last_sesion
		$last_sesion = auth()->user()->last_sesion != '0000-00-00 00:00:00' 
						? new \DateTime(auth()->user()->last_sesion)
						: new \DateTime();
		$dateNow = new \DateTime();
		$diff = $last_sesion->diff($dateNow);
		$days = $diff->format('%d');
		$hours = $diff->format('%h');
		if($days > 0){
			return redirect('/sesiones');
		}
		if(auth()->user()->roles_id == 1 && request()->ip() === '127.0.0.1'){
			cookie('origin_sesion','usuario con rol 1 - ip 127.0.0.1');
		}
        return $next($request);
    }
}
