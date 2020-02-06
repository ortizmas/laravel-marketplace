<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserStore
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
        if (auth()->user()->store()->count() == 0){
            flash('Você não possui uma loja, click não button para criar sua loja!!')->error();
            return redirect()->route('admin.stores.index');
        }
        return $next($request);
    }
}
