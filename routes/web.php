<?php

use App\Http\Controllers\AnsweringController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RespondensController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function(){
    Route::get("/login", "login")->name("login");
    Route::get("/register", "register")->name("register");
    Route::get("/logout", "logout")->name("logout")->middleware("auth");

    Route::post("loginpost", "loginPost");
    Route::post("registerpost", "registerPost");
});

Route::controller(AppController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get("/dashboard", "dashboard")->name("dashboard");
        Route::get("/profile", "profile")->name("profile");
        Route::get("/useredit", "editProfile")->name("editProfile");
        Route::get("/changepassword", "changePassword")->name("changepassword");

        Route::patch("usereditpost", "editProfilePost");
        Route::patch("userchangepasswordpost", "changePasswordPost");
    });
});


Route::controller(FormController::class)->group(function(){
    Route::prefix("/formmanagement")->group(function(){
        Route::middleware('auth')->group(function(){
            Route::get("/", "index")->name("formManagement");
            Route::get("/hapus/{id}", "deleteForm")->name("deleteForm");
            Route::get("/edit/{id}", "editForm")->name("editForm");

            Route::prefix("/soal")->group(function(){
                Route::get("/{id}", "soalManagement")->name("soal");
                Route::get("/hapus/{id}", "soalHapus");
                Route::get("/edit/{id}", "soalEdit")->name("soalEdit");

                Route::post("create", "soalCreate");
                Route::patch("editpost", "soalEditPost");
            });

            Route::prefix("/jawaban")->group(function(){
                Route::get("/{id}/{form}", "jawaban")->name("jawaban");

                Route::post("post", "jawabanPost");
            });

            Route::post("createform", "createForm");
            Route::patch("formeditpost", "editFormPost");
        });
    });
});

Route::controller(StatisticsController::class)->group(function(){
    Route::prefix("/statistics")->group(function(){
        Route::get("/", "index")->name("statistics");
        Route::get("/soalstats/{id_form}", "soalStats")->name("listSoalStats");
        Route::get("/detail/{id_soal}", "detail")->name("detailStats");
    });
});


Route::controller(RespondensController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::prefix('/respondens')->group(function(){
            Route::get('/', 'index')->name("respondens");
            Route::get('/form/{id_form}', 'formRespondens')->name("formRespondens");
            Route::get('/detail/{group}', 'detail')->name("detailResponden");
        });
    });
});


Route::get("/form/{slug}", [AnsweringController::class, "index"]);
Route::post("/form/post", [AnsweringController::class, "post"]);

Route::get("/success", function(){
    return view("success");
})->name("success");
