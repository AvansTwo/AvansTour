<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;


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

//Tour index
Route::get('/speurtochten', [TourController::class, 'index']);

//Tour create
Route::post('/speurtochten/aanmaken', [TourController::class, 'store']);

Route::get('/speurtochten/aanmaken', [TourController::class, 'create']);

//Tour edit
Route::get('/speurtochten/aanpassen/{id}', [TourController::class, 'edit']);

Route::post('/speurtochten/aanpassen', [TourController::class, 'update']);

//Tour show
Route::get('/speurtochten/{id}', [TourController::class, 'show']);

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
