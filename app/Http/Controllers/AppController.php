<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AppController extends Controller
{
    public function dashboard(){
        $title = "Dashboard";
        $username = Auth::user()->name;
        $role = Auth::user()->role;

        $formCount = count(Form::where("creator", Auth::user()->id)->get());

        return view("app.dashboard", compact("title", "username", "role", "formCount"));
    }

    public function profile(){
        $title = "Profile";
        $username = Auth::user()->name;
        $role = Auth::user()->role;
        $email = Auth::user()->email;

        return view("app.profile", compact("title", "username", "role", "email"));
    }

    public function editProfile(){
        $title = "Profile";
        $username = Auth::user()->name;
        $role = Auth::user()->role;

        return view("app.editprofile", compact("title", "username", "role"));
    }

    public function changePassword(){
        $title = "Change Password";
        $username = Auth::user()->name;
        $role = Auth::user()->role;

        return view("app.changepassword", compact("title", "username", "role"));
    }   

    public function editProfilePost(Request $request){
        $request->validate([
            "username" => "required"
        ]);

        $email = Auth::user()->email;

        $user = User::where("email", "=", $email);
        $update = $user->update(["name"=>$request->username]);

        if($update){
            return redirect()->route("profile")->with("success", "Berhasil mengedit profile");
        }else{
            return redirect()->route("profile")->with("error", "Gagal mengedit user profile");
        }
    }

    public function changePasswordPost(Request $request){
        $request->validate([
            "passwordlama"=>"required",
            "passwordbaru"=>"required",
            "password_conf"=>"required"
        ]);

        $email = Auth::user()->email;

        $user = User::where("email", $email)->first();

        if(password_verify($request->passwordlama, $user->password)){
            if($request->passwordbaru == $request->password_conf){
                $update = $user->update([
                    "password"=>Hash::make($request->passwordbaru)
                ]);
                if($update){
                    return redirect()->route("profile")->with("success", "Berhasil mengubah password anda");
                }else{
                    return redirect()->route("profile")->with("error", "Gagal mengubah password anda");
                }
            }else{
                return redirect()->back()->with("error", "Password baru dan konfirmasi tidak sama");
            }
        }else{
            return redirect()->back()->with("error", "Password lama salah");
        }
    }
}
