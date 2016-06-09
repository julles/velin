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
                $actions = injectModel('Action')->select('slug')->get()->toArray();

                if(in_array($action,$actions)) // jika action terdaftar di table action
                {
                    $cek = \Velin::cekRight($action); // cek action ada atau tidak

                    if($cek == false) // jika tidak
                    {
                        abort(404); // lempar ke 404
                    }else{
                        return $next($request); // jika ada teruskan request
                    }
                }else{
                        return $next($request); // jika ada teruskan request
                }
            }else{ // jika action kosong

                abort(404); // lempar 404
            }

        }else{ // jika action sama dengan default
            return $next($request); // teruskan request
        }

    }
}
