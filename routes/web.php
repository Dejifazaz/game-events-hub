<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// PUBLIC: Landing page
Route::get('/', fn() => view('welcome'));

// PROTECTED: Authenticated dashboard (only logged‐in + verified)
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth','verified'])
    ->name('dashboard');

// ALL AUTH ROUTES
Route::middleware('auth')->group(function () {
    // PROFILE
    Route::get('/profile',       [ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile',     [ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile',    [ProfileController::class,'destroy'])->name('profile.destroy');

    // EVENTS: full CRUD for normal users
    Route::resource('events', EventController::class);

    // ADMIN‐ONLY: wrap in can:isAdmin
    Route::prefix('admin')
        ->name('admin.')
        ->middleware('can:isAdmin')
        ->group(function(){
            // Dashboard
            Route::get('dashboard',       [AdminController::class,'adminDashboard'])
                ->name('dashboard');

            // Pending Events
            Route::get('events/pending',  [AdminController::class,'pendingEvents'])
                ->name('events.pending');

            // Approve
            Route::patch('events/{event}/approve', [AdminController::class,'approveEvent'])
                ->name('events.approve');
        });
});

// Auth scaffold: login/register/etc.
require __DIR__.'/auth.php';
