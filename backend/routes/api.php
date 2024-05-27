<?php

use App\Models\Article;
use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\SocieteResource;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SocieteController;

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

/* 1- ROUTES SOCIETES */
Route::get('/societes', function(){
    return SocieteResource::collection(Societe::all());
});

Route::get('/societe/{id}', function($id){
    return new SocieteResource(Societe::findorFail($id));
});

Route::post('/societe', [SocieteController::class, 'store']);

Route::put('/societe/{id}', [SocieteController::class, 'update']);

Route::delete('/societe/{id}', [SocieteController::class, 'destroy']);

/* 2- ROUTES ARTICLES */


Route::get('/article/{id}', function($id){
    return new ArticleResource(Article::findorFail($id));
});


Route::get('/articles', function(){
    return ArticleResource::collection(Article::all());
});

Route::put('/article/{id}', [ArticleController::class,'update']);

Route::post('/articles', [ArticleController::class, 'store']);

Route::delete('/article/{id}', [ArticleController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

