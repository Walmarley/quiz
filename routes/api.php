<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::group([], function(){
    Route::post('/store', [UserController::class, 'store']); //Registrar User
    Route::post('/loginUser', [UserController::class, 'loginUser']); //Loga
    Route::delete('/destroy/{id}', [UserController::class, 'destroy']); //apagar ususario
    Route::get('/index', [UserController::class, 'index']);
});

// Route::resource('/quiz',[UserController::class, function()]);
