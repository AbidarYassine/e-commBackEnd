<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::resource('/factures', [FactureController::class]);
Route::get("/factures", [Controllers\FactureController::class, 'index']);
Route::post("/factures", [Controllers\FactureController::class, 'store']);
Route::get("/factures/id/{id}", [Controllers\FactureController::class, 'show']);
