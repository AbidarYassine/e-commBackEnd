<?php

use App\Http\Controllers\CategorieController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', [Controllers\Auth\AuthController::class, 'login']);
    Route::post('logout', [Controllers\Auth\AuthController::class, 'logout']);
    Route::post('refresh', [Controllers\Auth\AuthController::class, 'refresh']);
    Route::post('register', [Controllers\Auth\AuthController::class, 'register']);
    Route::post('profile', [Controllers\Auth\AuthController::class, 'profile']);
});
//Route::group(['middleware' => 'auth:api'], function () {
Route::group(['prefix' => 'factures'], function () {
    Route::get("/", [Controllers\FactureController::class, 'index']);
    Route::post("/", [Controllers\FactureController::class, 'store']);
    Route::get("/commande/{idCommande}", [Controllers\FactureController::class, 'findByCommande']);
    Route::get("/id/{id}", [Controllers\FactureController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\FactureController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\FactureController::class, 'update']);
});
Route::group(['prefix' => 'mode-livraison'], function () {
    Route::get("/", [Controllers\ModelivraisonController::class, 'index']);
    Route::post("/", [Controllers\ModelivraisonController::class, 'store']);
    Route::get("/id/{id}", [Controllers\ModelivraisonController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\ModelivraisonController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\ModelivraisonController::class, 'update']);
});
Route::group(['prefix' => 'livraison'], function () {
    Route::get("/", [Controllers\LivraisonController::class, 'index']);
    Route::get("/boutique/{id}", [Controllers\LivraisonController::class, 'getALLivraisonByBoutique']);
    Route::post("/", [Controllers\LivraisonController::class, 'store']);
    Route::get("/id/{id}", [Controllers\LivraisonController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\LivraisonController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\LivraisonController::class, 'update']);
});
Route::group(['prefix' => 'boutiques'], function () {
    Route::get("/", [Controllers\BoutiqueController::class, 'index']);
    Route::post("/", [Controllers\BoutiqueController::class, 'store']);
    Route::get("/id/{id}", [Controllers\BoutiqueController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\BoutiqueController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\BoutiqueController::class, 'update']);
});
//});


Route::group(['prefix' => 'remarques'], function () {
    Route::get("/", [Controllers\RemarqueController::class, 'index']);
    Route::post("/", [Controllers\RemarqueController::class, 'store']);
    Route::get("/id/{id}", [Controllers\RemarqueController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\RemarqueController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\RemarqueController::class, 'update']);
});

Route::group(['prefix' => 'proprietes'], function () {
    Route::get("/", [Controllers\ProprieteController::class, 'index']);
    Route::post("/", [Controllers\ProprieteController::class, 'store']);
    Route::get("/id/{id}", [Controllers\ProprieteController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\ProprieteController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\ProprieteController::class, 'update']);
});
Route::group(['prefix' => 'categories'], function () {
    Route::get("/", [Controllers\CategorieController::class, 'index']);
    Route::post("/", [Controllers\CategorieController::class, 'store']);
    Route::get("/id/{id}", [Controllers\CategorieController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\CategorieController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\CategorieController::class, 'update']);
});


Route::group(['prefix' => 'boutiques'], function () {
    Route::get("/", [Controllers\BoutiqueController::class, 'index']);
    Route::post("/", [Controllers\BoutiqueController::class, 'store']);
    Route::get("/id/{id}", [Controllers\BoutiqueController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\BoutiqueController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\BoutiqueController::class, 'update']);
});


Route::group(['prefix' => 'Articles'], function () {
    Route::get("/", [Controllers\ArticleController::class, 'index']);
    Route::post("/", [Controllers\ArticleController::class, 'store']);
    Route::get("/id/{id}", [Controllers\ArticleController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\ArticleController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\ArticleController::class, 'update']);
});


Route::group(['prefix' => 'Marques'], function () {
    Route::get("/", [Controllers\MarqueController::class, 'index']);
    Route::post("/", [Controllers\MarqueController::class, 'store']);
    Route::get("/id/{id}", [Controllers\MarqueController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\MarqueController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\MarqueController::class, 'update']);
});


Route::group(['prefix' => 'Fournisseurs'], function () {
    Route::get("/", [Controllers\FournisseurController::class, 'index']);
    Route::post("/", [Controllers\FournisseurController::class, 'store']);
    Route::get("/id/{id}", [Controllers\FournisseurController::class, 'show']);
    Route::delete("/id/{id}", [Controllers\FournisseurController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\FournisseurController::class, 'update']);
});

### for admin
## etat commande
Route::group(['prefix' => 'privileges'], function () {
    Route::get("/", [Controllers\PrivilegeController::class, 'index']);
    Route::post("/", [Controllers\PrivilegeController::class, 'store']);
    Route::get("/id/{id}", [Controllers\PrivilegeController::class, 'show']);
    Route::get("/libelle/{libelle}", [Controllers\PrivilegeController::class, 'findByLibelle']);
    Route::delete("/id/{id}", [Controllers\PrivilegeController::class, 'destroy']);
    Route::put("/update/{id}", [Controllers\PrivilegeController::class, 'update']);
});
