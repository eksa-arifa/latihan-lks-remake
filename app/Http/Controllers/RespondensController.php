<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Group;
use App\Models\Responden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespondensController extends Controller
{
    public function index(){
        $title = "Respondens";
        $username = Auth::user()->name;

        $form = Form::where("creator", Auth::user()->id)->paginate(10);


        return view("respondens.index", compact("title", "username", "form"));
    }

    public function formRespondens($id_form){
        $title = "Group respondens";
        $username = Auth::user()->name;
        $group = Group::where("id_form", $id_form)->paginate(10);

        return view("respondens.group", compact("title", "username", "group"));
    }

    public function detail($group){
        $title = "Group respondens";
        $username = Auth::user()->name;

        $responden = Responden::where("group", $group)->paginate(10);

        return view("respondens.detail", compact("title", "username", "responden", "group"));
    }
}
