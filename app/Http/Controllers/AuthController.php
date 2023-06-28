<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('login');
    }
    public function loginAction(Request $request)
    {
        $user = $request->only(
            'email',
            'password'
        );
        if ($this->appRepository->login($user)) {
            return redirect()->route('home');
        }
        return redirect()->back()->with('status', 'Email or Password Wrong');
    }
    public function logoutAction()
    {
        session()->flush('user');
        return redirect()->action('App\Http\Controllers\AuthController@loginIndex');
    }
}
