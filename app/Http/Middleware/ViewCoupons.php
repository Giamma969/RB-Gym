<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ViewCoupons
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
        $services = User::getPermissions();
        $is_admin = User::checkIfAdmin();
        if(!(in_array("view_coupons", $services)) && $is_admin === false){
            return redirect('/admin/dashboard')->with('flash_message_error','You do not have permission to access this section');
        }
        return $next($request);
    }
}
