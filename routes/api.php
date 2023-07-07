<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ExpenseCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'checkLogin']);

Route::group(['middleware'=>['user_auth']], function(){

    Route::prefix('expense-category')->group(function(){
        Route::get('/',[ExpenseCategoryController::class,'index']);
        Route::post('/create',[ExpenseCategoryController::class,'create']);
        Route::post('/update/{id}',[ExpenseCategoryController::class,'update']);
        Route::get('/delete/{id}',[ExpenseCategoryController::class,'delete']);
    });

    Route::get('/logout', [LoginController::class, 'logout']);

});