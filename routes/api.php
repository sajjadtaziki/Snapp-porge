<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('TheDriver/storm',[\App\Http\Controllers\TheDriverController::class,'storm']);
Route::get('TheDriver/{the_driver}/show',[\App\Http\Controllers\TheDriverController::class,'show']);
Route::put('TheDriver/{the_driver}/update',[\App\Http\Controllers\TheDriverController::class,'update']);
Route::delete('TheDriver/{the_driver}/delete',[\App\Http\Controllers\TheDriverController::class,'delete']);

//block
Route::post('Block_Number/storm',[\App\Http\Controllers\BlockNumberController::class,'storm']);
Route::get('Block_Number/{Block_Number}/show',[\App\Http\Controllers\BlockNumberController::class,'show']);
Route::get('Block_Number/showall',[\App\Http\Controllers\BlockNumberController::class,'showall']);
Route::put('Block_Number/{Block_Number}/update',[\App\Http\Controllers\BlockNumberController::class,'update']);
Route::delete('Block_Number/{Block_Number}/delete',[\App\Http\Controllers\BlockNumberController::class,'delete']);
