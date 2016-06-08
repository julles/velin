<?php

namespace App\Http\Middleware;

use Closure;

class VelinRight
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
        $menu = $request->segment(2);
        
        $action = $request->segment(3);

        if($menu != 'default') // jika menu != default
        {
            if(!empty($action)) // jika action tidak kosong
            {
                if($action != 'data') // jika action != data
                {
                    $cek = \Velin::cekRight($action); // cek action ada atau tidak

                    if($cek == false) // jika tidak
                    {
                        abort(404); // lempar ke 404
                    }else{
                        return $next($request); // jika ada teruskan request
                    }
            
                }else{ // jika action sama dengan data
                    return $next($request); // lanjutkan request
                
                }
                
            }else{ // jika action kosong

                abort(404); // lempar 404
            }

        }else{ // jika action sama dengan default
            return $next($request); // teruskan request
        }

    }
}
