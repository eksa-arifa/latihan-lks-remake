<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Form;
use App\Models\Group;
use App\Models\Question;
use App\Models\Responden;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnsweringController extends Controller
{
    public function index($slug){
        $form = Form::where("slug", $slug)->first();

        if($form != null){
    
            return view("mengerjakan", compact("form"));
        }else{
            return response("Form Is Not found", 404);
        }

    }

    public function post(Request $request){
        $request->validate([
            "jawaban" => "required",
            "id_form" => "required",
            "id_soal" => "required"
        ]);

        $success = 0;
        $randGroup = Str::random(10);


        $gcreate = Group::create([
            "group" => $randGroup,
            "form_id" => $request->id_form
        ]);

        if($gcreate){

            foreach($request->jawaban as $key => $value){
                $create = Responden::create([
                    "group" => $randGroup,
                    "pertanyaan" => $key,
                    "jawaban" => $value,
                    "question_id" => $request->id_soal[$success]
                ]);
    
                if($create){
                    $success++;
                }else{
                    return redirect()->back();
                }
            }
    
            if(count($request->jawaban) == $success){
                return redirect()->route("success");
            }
        }else{
            return response("Internal server error", 500);
        }

    }
}
