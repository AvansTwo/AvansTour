<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\QuestionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Index
Route::get('/', function () {
    return view('welcome');
});

//Category Filter
Route::get('/speurtochten/categorie/{id}', [TourController::class, 'categoryFilter']);

//Tour index
Route::get('/speurtochten', [TourController::class, 'index']);


//Tour create
Route::post('/speurtochten/aanmaken', [TourController::class, 'store']);
Route::post('/vraag/aanmaken', [QuestionController::class, 'store']);

Route::get('/speurtochten/aanmaken', [TourController::class, 'create']);

//Tour edit
Route::post('/speurtochten/aanpassen/{id}', [TourController::class, 'update']);
Route::get('/speurtochten/aanpassen/{id}', [TourController::class, 'edit']);

//Tour show
Route::get('/speurtochten/{id}', [TourController::class, 'show']);

//Question create
Route::post('/speurtochten/{id}/vragen/aanmaken', [QuestionController::class, 'store']);
Route::get('/speurtochten/{id}/vragen/aanmaken', [QuestionController::class, 'create']);

//Question show
Route::get('/vragen/{id}', [QuestionController::class, 'show']);

//Question edit
Route::post('/vragen/aanpassen/{id}', [QuestionController::class, 'update']);
Route::get('/vragen/aanpassen/{id}', [QuestionController::class, 'edit']);

//Dashboard
