<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('ad_login');
    }

    public function aunticate(Request $request){

        $credential = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // $token = auth()->guard('api')->attempt($credential);

        // if (!$token) {
            //     return response()->json(['error' => 'Unauthorized'], 401);
            // }

        if (Auth::attempt($credential)) {
            // dd(auth());

            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');

    }
}
