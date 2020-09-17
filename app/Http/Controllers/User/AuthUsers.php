<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Foundation\Console\Presets\Vue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Email;
use lluminate\Auth\RequestGuard;

class AuthUsers extends Controller
{

    public function index()
    {
        return view('style.home');
    }

    public function login()
    {
        $remperMy = request('rememberme') ? true : false;
        if (Auth::guard('user')->attempt(['email' => request('email'), 'password' => request('password')], $remperMy)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('apptoken')->accessToken;
            // $success['token'] = $user->createToken();

            return response([
                'status'    => true,
                'token'     => $success,
                'user'      => $user,
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => atrans('inccorrect_information_login'),
            ], 401);
        }
    }


    public function logout()
    {
        auth()->guard('user')->logout();

        return view('style/home');
    }






































    // public function init()
    // {

    //         $user = user();
    //         return response()->json(['user' => $user], 200);

    // }
    // public function login_post()
    // {
    //     $remperMy= request('rememberme') ? true : false ;
    //     if (user()->attempt(['email'=>request('email'),'password'=>request('password')],$remperMy)) {

    //         $user = User::where('email', request('email'));
    //         return response()->json(['user' => $user]  ,200);
    //     }else{
    //         return response()->json(['error', atrans('inccorrect_information_login') ],401);
    //     }
    // }




    // public function forgot_password()
    // {
    //     return view('user.forgote_password');
    // }
}
