<?php

namespace App\Http\Middleware;

use App\Repositories\PrivilegeRepository;
use Closure;

class SystemAccess
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
        !auth()->user() ?? redirect('login');
        $menus = new PrivilegeRepository();
        $menus = $menus->generateMenu()->toArray();
        $request->session()->flash('menus',collect($menus));
        return $next($request);
    }
}
