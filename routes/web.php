<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UtilisateurController;
use App\Http\COntrollers\GroupeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function (){
        return view('dashboard');
    })->name('dashboard');

    Route::get('test', [TestController::class, 'index'])->name('test');
    Route::post('results/{id}', [TestController::class, 'results'])->name('results');

    // route for admin
    Route::middleware(['auth', 'admin'])->group(function (){
        Route::prefix('admin')->group(function (){
            Route::get('/', [AdminController::class, 'index'])->name('admin');
            Route::resource('question', QuestionController::class);
            Route::resource('utilisateur', UtilisateurController::class);
            Route::resource('groupe', GroupeController::class);
            Route::resource('score', ScoreController::class);
        });
    });

});
