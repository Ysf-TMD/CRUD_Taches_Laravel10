<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TacheController ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/",function(){return view ("welcom");});

Route::get("/index",[\App\Http\Controllers\WelcomController::class , "index"]);
Route::get("/apropos",[\App\Http\Controllers\WelcomController::class , "apropos"]);
Route::get("/contact",[\App\Http\Controllers\WelcomController::class , "contact"]);
// la méthode Route::resource generer les routes pour les actions CRUD crées avec le controlleur ...
//exemple d'application ... voir le tableau PDF mvc TP 6
Route::resource('/taches',TacheController::class);



