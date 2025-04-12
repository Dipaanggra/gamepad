<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameVersionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::group(function () {
Route::get('/', [\App\Http\Controllers\User\GameController::class, 'welcome'])->name('welcome');
Route::get('/games', [\App\Http\Controllers\User\GameController::class, 'index'])->name('user.game');
Route::get('/games/{game:slug}', [\App\Http\Controllers\User\GameController::class, 'show'])->name('user.game.show');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('game/{game:slug}/{version}')->group(function () {
        Route::post('/score', [ScoreController::class, 'store'])->name('score.store');
    });
    // Admin & Developer
    Route::middleware(['role:admin|developer'])
        ->prefix('dashboard')
        ->group(function () {
            Route::get('/', DashboardController::class)->name('dashboard');
            // Game Dashboard
            Route::resource('game', GameController::class)->except('show');
            Route::get('game/{game:slug}', [GameController::class, 'show'])->name('game.show');

            // Game Version (nested in Game by slug)
            Route::prefix('game/{game:slug}')->group(function () {
                Route::resource('version', GameVersionController::class)->except('index');
            });

            // User Dashboard
            Route::resource('user', UserController::class)
                ->middleware('role:admin')
                ->except('show');
        });
});



require __DIR__ . '/auth.php';
