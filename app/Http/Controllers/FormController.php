<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public function index(){
        $title = "Form Management";
        $username = Auth::user()->name;
        $host = $_SERVER["HTTP_HOST"];

        $form = Form::where("creator", Auth::user()->id)->paginate(3);

        return view("form.management", compact("title", "username", "form", "host"));
    }

    public function createForm(Request $request){
        $request->validate([
            "title" => "required",
            "description" => "required"
        ]);

        $slug = Str::random(15);

        $create = Form::create([
            "title" => $request->title,
            "description" => $request->description,
            "creator" => Auth::user()->id,
            "slug" => $slug
        ]);

        if($create){
            return redirect()->back()->with("success", "Berhasil membuat form");
        }else{
            return redirect()->back()->with("error", "Gagal membuat form");
            
        }
    }

    public function deleteForm($id){
        $delete = Form::destroy($id);

        if($delete){
            return redirect()->back()->with("success", "Berhasil menghapus data");
        }else{
            return redirect()->back()->with("error", "Gagal menghapus data");
        }
    }

    public function editForm($id){
        $title = "Edit Form";
        $username = Auth::user()->name;

        $form = Form::findOrFail($id);


        return view("form.editform", compact("title", "username", "form", "id"));
    }

    public function editFormPost(Request $request){
        $request->validate([
            "title" => "required",
            "description" => "required",
            "id" => "required"
        ]);

        $form = Form::findOrFail($request->id);

        $update = $form->update([
            "title" => $request->title,
            "description" => $request->description
        ]);

        return ($update) ? redirect()->route("formManagement")->with("success", "Berhasil mengedit form") : redirect()->back()->with("error", "Gagal mengedit form");
    }

    public function soalManagement($id){
        $title = "Soal Management";
        $username = Auth::user()->name;

        $questions = Question::where("id_form", $id)->paginate(5);

        $answers = Answer::get();

        return view("form.soal.management", compact("title", "username", "questions", "id", "answers"));
    }

    public function soalCreate(Request $request){
        $request->validate([
            "question" => "required",
            "type" => "required",
            "id" => "required"
        ]);

        $create = Question::create([
            "question" => $request->question,
            "type" => $request->type,
            "id_form" => $request->id
        ]);

        if($create){
            return redirect()->back()->with("success", "Berhasil membuat soal");
        }else{
            return redirect()->back()->with("error", "Gagal membuat soal");
        }
    }

    public function soalHapus($id){
        $hapus = Question::destroy($id);

        if($hapus){
            return redirect()->back()->with("success", "Berhasil menghapus soal");
        }else{
            return redirect()->back()->with("error", "Gagal menghapus soal");
        }
    }

    public function soalEdit($id){
        $title = "Soal Edit";
        $username = Auth::user()->name;

        $question = Question::find($id);
        

        return view("form.soal.edit", compact("title", "username", "question", "id"));
    }

    public function soalEditPost(Request $request){
        $request->validate([
            "question" => "required",
            "type" => "required",
            "id" => "required"
        ]);

        $q = Question::where("id", $request->id);

        $update = $q->update([
            "question" => $request->question,
            "type" => $request->type
        ]);

        return redirect()->back()->with(($update)?"success":"error", ($update)?"Berhasil mengedit soal":"Gagal mengedit soal");

    }

    public function jawaban($id, $form){
        $title = "Insert Jawaban";
        $username = Auth::user()->name;



        return view("form.jawaban.insert", compact("title", "username", "id", "form"));
    }

    public function jawabanPost(Request $request){
        $request->validate([
            "answers" => "required"
        ]);

        foreach($request->answers as $a){
            Answer::create([
                "answer" => $a,
                "id_soal" => $request->id
            ]);
        }

        return redirect()->route("soal", ["id"=>$request->form])->with("success", "Berhasil menambahkan soal");
    }
}
