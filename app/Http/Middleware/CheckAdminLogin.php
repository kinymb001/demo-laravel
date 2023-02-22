<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckAdminLogin
{
    public function handle(Request $request, Closure $next)
    {
        $roles = Auth::user()->getRoleNames();
        foreach($roles as $role){
            if($role == User::SUPER_ADMIN || $role == User::ADMIN){
                // dd(Auth::user());
                // if(Auth::user()->login_type == 0){
                    return $next($request);
                // }else {
                //     return redirect()->route('home');
                // }
            }
        }

        return redirect()->route('home');
    }
}