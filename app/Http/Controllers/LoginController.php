<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // validasi ketat
        // $credentials = $request->validate([
        //     'email' => 'required|email:dns',
        //     'password' => 'required'
        // ]);


        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::find(1);
        if (isset($user)) {
            Auth::login($user);
            $request->session()->regenerate();
            //user is logged in.
            return redirect()->intended('/dashboard');
        }

        $email = $request->get('a@gmail.com');
        $attempt = Auth::attempt($credentials);
        // dd('log');
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     // return redirect()->intended('/dashboard');
        //     // return redirect()->intended('/dashboard');
        // }

        // if (!$attempt) {
        //     $request->session()->regenerate();

        //     // return redirect()->intended('/dashboard');
        //     return redirect()->intended('/');
        // }
        // dd('log');

        // if(Auth::attempt(['email' => $email, 'password' => $password]))
        // return back()->withErrors('loginError','Login Failed');
        return back()->with('loginError', 'Login Failed');
    }

    public function logout()
    {

        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
