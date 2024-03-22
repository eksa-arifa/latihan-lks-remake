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


        $form = Form::where("user_id", Auth::user()->id)->paginate(10);


        return view("statistics.index", compact("title", "form"));
    }

    public function soalStats($id_form){
        $title = "Statistics";

        $form = Form::find($id_form);

        return view("statistics.soalStats", compact("title", "form"));
    }

    public function detail($id_soal){
        $title = "Statistics";

        $checkTypeOfSoal = (Question::find($id_soal)["type"] == "multiple-answer");

        if($checkTypeOfSoal){
            $data = array();
            $label = array();
            $question = Question::find($id_soal);

            $jawaban = Answer::where("question_id", $id_soal)->get();

            foreach($jawaban as $j){
                $responden = count(Responden::where("question_id", $id_soal)->where("jawaban", $j["answer"])->get());
                array_push($data, $responden);
                array_push($label, $j["answer"]);
            }

            return view("statistics.detail", compact("title", "question", "data", "label"));
        }else{
            return response("Not Found", 404);
        }
    }
}
