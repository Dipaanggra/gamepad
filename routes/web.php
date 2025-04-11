<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::group(function () {
    Route::get('/', [\App\Http\Controllers\User\GameController::class, 'welcome'])->name('welcome');
    Route::get('/games', [\App\Http\Controllers\User\GameController::class, 'index'])->name('user.game');
    Route::get('/games/{game}', [\App\Http\Controllers\User\GameController::class, 'show'])->name('user.game.show');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Admin & Developer
    Route::middleware(['role:admin|developer'])
        ->prefix('dashboard')
        ->group(function () {
            Route::get('/', DashboardController::class)->name('dashboard');
            // Game Dashboard
            Route::resource('game', GameController::class);
            // User Dashboard
            Route::resource('user', UserController::class)
                ->middleware('role:admin')
                ->except('show');
        });
});



require __DIR__ . '/auth.php';
