<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        if(!Auth::check()){
            return view("auth.login");
        }else{
            return redirect()->route("dashboard");
        }
    }

    public function register(){
        if(!Auth::check()){
            return view("auth.register");
        }else{
            return redirect()->route("dashboard");
        }
    }

    public function loginPost(Request $request){
        $request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);

        $credentials = $request->only("email", "password");

        if(Auth::attempt($credentials)){
            return redirect()->route("dashboard")->with("success", "login berhasil");
        }else{
            Auth::logout();
            return redirect()->back()->with("error", "gagal login");
        }
    }

    public function registerPost(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
            "re_pass" => "required"
        ]);

        $checkemailunique = User::where("email", $request->email)->first();
        
        if($checkemailunique == null){
            if($request->password == $request->re_pass){
                $create = User::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    'email_verified_at' => now(),
                    "password" => Hash::make($request->password),
                    "role" => "client"
                ]);

                
                if($create){
                    $credentials = $request->only("email", "password");
                    if(Auth::attempt($credentials)){
                        return redirect()->route("dashboard")->with("success", "Berhasil membuat user sekaligus login");
                    }else{
                        Auth::logout();
                        return redirect()->back()->with("error", "Gagal Login tetapi user berhasil di buat, silahkan login di halaman login");
                    }
                }else{
                    return redirect()->back()->with("error", "Gagal membuat user");
                }
            }else{
                return redirect()->back()->with("error", "Password dan konfirmasi password tidak sama");
            }
        }else{
            return redirect()->back()->with("error", "Email sudah terdaftar");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("login")->with("success", "logout berhasil");
    }
}
