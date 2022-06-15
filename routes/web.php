<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScoreboardController;
use App\Http\Controllers\DashboardController;


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
Route::get('/speurtochten/aanmaken', [TourController::class, 'create']);

Route::get('/answerMap/{id}', [QuestionController::class, 'answerMap']);

//Tour edit
Route::post('/speurtochten/aanpassen/{id}', [TourController::class, 'update']);
Route::get('/speurtochten/aanpassen/{id}', [TourController::class, 'edit']);

//Tour show
Route::get('/speurtochten/{id}', [TourController::class, 'show']);

//Tour delete
Route::get('/speurtochten/verwijderen/{id}', [TourController::class, 'destroy']);

//Question create
Route::post('/speurtochten/{id}/vragen/aanmaken', [QuestionController::class, 'store']);
Route::get('/speurtochten/{id}/vragen/aanmaken', [QuestionController::class, 'create']);

//Question show
Route::get('/vragen/{id}', [QuestionController::class, 'show']);

//Question edit
Route::post('/vragen/aanpassen/{id}', [QuestionController::class, 'update']);
Route::get('/vragen/aanpassen/{id}', [QuestionController::class, 'edit']);

//Question delete
Route::get('/vragen/verwijderen/{id}', [QuestionController::class, 'destroy']);

//Quiz create team
Route::post('/quiz/aanmaken', [QuizController::class, 'store']);
Route::get('/speurtochten/{id}/quiz', [QuizController::class, 'create']);

//Quiz play mapselect page
Route::get('/quiz/spelen/{teamHash}', [QuizController::class, 'getRemainingQuestions']);

//Quiz eindscherm
Route::get('/quiz/ending/{teamHash}', [QuizController::class, 'quizEnding']);


//Quiz play get question
Route::get('/quiz/spelen/{teamHash}/vraag/{questionId}', [QuizController::class, 'getQuestion']);

//Quiz play store answer question
Route::post('/quiz/spelen/{teamHash}/vraag/{questionId}/beantwoorden', [QuizController::class, 'storeTeamProgress']);

//Quiz finish
Route::get('/quiz/end/{id}', [QuizController::class, 'end']);

//Quiz end
Route::get('/quiz/einde/{teamHash}', [QuizController::class, 'endQuiz']);


//Scoreboard
Route::get('/scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard.index');

//Scoreboard search
Route::post('/scoreboard/team', [ScoreboardController::class, 'teamFilter']);

Route::get('/scoreboard/category/{categoryId}', [ScoreboardController::class, 'categoryFilter'])->name('scoreboardCategoryFilter');
Route::get('/scoreboard/SortPoints/{sortId}', [ScoreboardController::class, 'sortPoints'])->name('sortPoints');
Route::get('/scoreboard/SortTime/{sortId}', [ScoreboardController::class, 'sortTime'])->name('sortTime');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/vraag', [DashboardController::class, 'show'])->middleware(['auth'])->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
