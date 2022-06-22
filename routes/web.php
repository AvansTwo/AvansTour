<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScoreboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;




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
Route::get('/tours', [TourController::class, 'index']);

//Tour Filter
Route::get('/tours/categorie/{id}', [TourController::class, 'categoryFilter']);

//TODO: Waarvoor deze route?
Route::get('/answerMap/{id}', [QuestionController::class, 'answerMap']);

//Tour create
Route::post('/tour/aanmaken', [TourController::class, 'store'])->middleware('auth');
Route::get('/tour/aanmaken', [TourController::class, 'create'])->middleware('auth');

//Tour edit
Route::post('/tour/aanpassen/{id}', [TourController::class, 'update'])->middleware('auth');
Route::get('/tour/aanpassen/{id}', [TourController::class, 'edit'])->middleware('auth');

//Tour delete
Route::get('/tour/verwijderen/{id}', [TourController::class, 'destroy'])->middleware('auth');

//Tour show
Route::get('/tour/{id}', [TourController::class, 'show']);

//Question create
Route::post('/tour/{id}/vragen/aanmaken', [QuestionController::class, 'store'])->middleware('auth');
Route::get('/tour/{id}/vragen/aanmaken', [QuestionController::class, 'create'])->middleware('auth');

//Question show
Route::get('/vragen/{id}', [QuestionController::class, 'show']);

//Question edit
Route::post('/vragen/aanpassen/{id}', [QuestionController::class, 'update'])->middleware('auth');
Route::get('/vragen/aanpassen/{id}', [QuestionController::class, 'edit'])->middleware('auth');

//Question delete
Route::get('/vragen/verwijderen/{id}', [QuestionController::class, 'destroy'])->middleware('auth');

//Quiz create team
Route::post('/quiz/aanmaken', [QuizController::class, 'store']);
Route::get('/tour/{id}/quiz', [QuizController::class, 'create']);

//Quiz play mapselect page
Route::get('/quiz/spelen/{teamHash}', [QuizController::class, 'getRemainingQuestions']);


//Quiz play get question
Route::get('/quiz/spelen/{teamHash}/vraag/{questionId}', [QuizController::class, 'getQuestion']);

//Quiz play store answer question
Route::post('/quiz/spelen/{teamHash}/vraag/{questionId}/beantwoorden', [QuizController::class, 'storeTeamProgress']);

//Quiz finish
Route::get('/quiz/einde/{teamHash}', [QuizController::class, 'quizEnding']);

//Scoreboard
Route::get('/scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard.index');

//Scoreboard search
Route::post('/scoreboard/team', [ScoreboardController::class, 'teamFilter']);
Route::post('/scoreboard/dag', [ScoreboardController::class, 'dayFilter'])->name('scoreboard.dayFilter');

Route::get('/scoreboard/categorie/{categoryId}', [ScoreboardController::class, 'categoryFilter'])->name('scoreboardCategoryFilter');
Route::get('/scoreboard/punten/{sortId}', [ScoreboardController::class, 'sortPoints'])->name('sortPoints');
Route::get('/scoreboard/tijd/{sortId}', [ScoreboardController::class, 'sortTime'])->name('sortTime');

//Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/team/{teamId}', [DashboardController::class, 'teamIndex'])
        ->name('dashboardTeamIndex');

    Route::get('/dashboard/vraag/{teamProgressId}', [DashboardController::class, 'show'])
        ->name('dashboardShow');

    Route::get('/dashboard/vraag/{teamProgressId}/goed', [DashboardController::class, 'correctAnswer'])
        ->name('dashboardCorrectAnswer');

    Route::get('/dashboard/vraag/{teamProgressId}/fout', [DashboardController::class, 'inCorrectAnswer'])
        ->name('dashboardInCorrectAnswer');

    //Settings
    Route::get('/instellingen', [AdminController::class, 'index'])->name("settings");
    Route::post('/instellingen/radius/aanpassen', [AdminController::class, 'updateRadius']);

    Route::get('/instellingen/gebruikers', [UserController::class, 'index']);
    Route::get('/instellingen/gebruiker/{id}/verwijderen', [UserController::class, 'destroy']);
    Route::post('/instellingen/gebruiker/aanmaken', [UserController::class, 'store']);

    Route::get('/instellingen/categorieen', [CategoryController::class, 'index']);
    Route::get('/instellingen/categorie/{id}/verwijderen', [CategoryController::class, 'destroy']);
    Route::post('/instellingen/categorie/aanmaken', [CategoryController::class, 'store']);

    Route::post('/instellingen/teamsverwijderen', [AdminController::class, 'deleteTeamsInRange']);
});


require __DIR__ . '/auth.php';
