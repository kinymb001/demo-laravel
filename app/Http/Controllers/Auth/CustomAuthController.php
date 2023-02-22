<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomAuthController extends Controller
{
    use AuthenticatesUsers;

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->logout_at = now();
        $user->save();
        $channel = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/users.log'),
        ]);

        Log::stack(['slack', $channel])->info("user id :" . $user->id . " - " . $user->name . ". Logout at : " . $user->login_at);


        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}