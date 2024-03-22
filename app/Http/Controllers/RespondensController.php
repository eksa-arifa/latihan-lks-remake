<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Group;
use App\Models\Question;
use App\Models\Responden;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespondensController extends Controller
{
    public function index(){
        $title = "Respondens";

        $form = User::find(Auth::user()->id)->form()->paginate(10);


        return view("respondens.index", compact("title", "form"));
    }

    public function formRespondens($id_form){
        $title = "Group respondens";
    
        $group = Group::where("form_id", $id_form)->paginate(10);

        return view("respondens.group", compact("title", "group"));
    }

    public function detail($group){
        $title = "Group respondens";

        $responden = Responden::where("group", $group)->paginate(10);


        return view("respondens.detail", compact("title", "responden", "group"));
    }
}
