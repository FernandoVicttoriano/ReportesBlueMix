<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class PermisoAdmin
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
      // dd($this->permiso(),session()->get('tipo_usuario'));
        if ($this->permiso()) {
            return $next($request);    
        }
        Session::flash('error','No tiene los permisos para entrar a esta pagina');
        return redirect('/publicos')->with('mensaje','No tiene los permisos para entrar a esta pagina');
       
    }

    private function permiso(){

        if(session()->get('tipo_usuario') =='admin' || session()->get('tipo_usuario') == 'adminGiftCard' ){
            return true;

        }else{

        return false;

        }
    }
}
