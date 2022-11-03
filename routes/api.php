<?php

use App\Http\Controllers\AuthenticateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'users'], function(){
    Route::post('/store', [UserController::class, 'store']); //Registrar User
    Route::delete('/destroy/{id}', [UserController::class, 'destroy']); //apagar ususario
    Route::get('/index', [UserController::class, 'index']); //listar todos User
    Route::post('/update/{id}', [UserController::class, 'update']); //atualizar
    Route::get('/show/{id}', [UserController::class, 'show']); //listar um User
});

Route::group(['prefix' => 'questions'], function(){
    Route::get('/index', [QuestionsController::class, 'index']); //listar todas questoes
    Route::post('/store', [QuestionsController::class, 'store']); //add
    Route::middleware('auth:sanctum')->get('/show/{id}', [QuestionsController::class, 'show']); //listar 1
    Route::middleware('auth:sanctum')->get('/validaQuest/{id}/{resposta}', [QuestionsController::class, 'validaQuest']); //validar resposta
    Route::delete('/destroy/{id}', [QuestionsController::class, 'destroy']); //apagar questão
    Route::get('/listadez', [QuestionsController::class, 'listaDezQuestoes']); //listar todas questoes
});

Route::group(['prefix' => 'auth'], function(){
    Route::get('/unnauthorized', [AuthenticateController::class, 'unnauthorized'])->name('loginUser');
    Route::post('/login', [AuthenticateController::class, 'loginUser']); //Loga
    Route::middleware('auth:sanctum')->get('/logout', [AuthenticateController::class, 'logout']); //desloga
});

// Route::resource('/quiz',[UserController::class, function()]);
