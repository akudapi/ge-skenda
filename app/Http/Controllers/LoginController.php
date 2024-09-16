<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function login_proses(Request $request){

        // dd($request->all());

        $request->validate([
            'username'  => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->back();
        }else{
            return redirect()->back();
       }

    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
