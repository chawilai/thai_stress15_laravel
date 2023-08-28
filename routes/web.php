<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Stress15/HomeStress15');
});

Route::post('/save_user_info', [QuestionsController::class, 'saveUserInfo']);


Route::get('/question', function () {
    return Inertia::render('Stress15/Stress15', ['id' => request('id'),]);
})->name('question');

Route::get('/getAllQuestionandAnswer', [QuestionsController::class, 'getAllQuestionsAndAnswers']);

Route::post('/saveQuestion', [QuestionsController::class, 'saveQuestion']);

Route::get('/success', function () {
    return Inertia::render('Stress15/Success', ['id' => request('id'),'totalScore' => request('totalScore'),'assessment' => request('assessment'),]);
})->name('success');

Route::get('/getUserAnswerData', [QuestionsController::class, 'getUserAnswerData']);

Route::post('/printForwarder', [QuestionsController::class, 'printForwarder']);

Route::get('/forwarder', function () {
    return Inertia::render('Stress15/Forwarder');
})->name('forwarder');


Route::get('/stress15', function () {
    return Inertia::render('Stress15/Stress15');
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [ProfileController::class, 'admin'])->name('admin.home');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
