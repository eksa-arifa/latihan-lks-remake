<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Form;
use App\Models\Question;
use App\Models\Responden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function index(){
        $title = "Statistics";
        $username = Auth::user()->name;


        $form = Form::where("creator", Auth::user()->id)->paginate(10);


        return view("statistics.index", compact("title", "username", "form"));
    }

    public function soalStats($id_form){
        $title = "Statistics";
        $username = Auth::user()->name;

        $form = Form::find($id_form);

        $question = Question::where("id_form", $id_form)->get();

        return view("statistics.soalStats", compact("title", "username", "form", "question"));
    }

    public function detail($id_soal){
        $title = "Statistics";
        $username = Auth::user()->name;

        $checkTypeOfSoal = (Question::find($id_soal)["type"] == "multiple-answer");

        if($checkTypeOfSoal){
            $data = array();
            $label = array();
            $question = Question::find($id_soal);

            $jawaban = Answer::where("id_soal", $id_soal)->get();

            foreach($jawaban as $j){
                $responden = count(Responden::where("id_soal", $id_soal)->where("jawaban", $j["answer"])->get());
                array_push($data, $responden);
                array_push($label, $j["answer"]);
            }

            return view("statistics.detail", compact("title", "username", "question", "data", "label"));
        }else{
            return response("Not Found", 404);
        }
    }
}
