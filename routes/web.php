<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// Public welcome page
Route::get('/', function () {
    return view('welcome');
});

// Authenticated dashboard view
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Event CRUD resource routes
    Route::resource('events', EventController::class);

    // Admin-only routes using custom admin middleware
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        // Admin dashboard
        Route::get('dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');

        // Pending events for approval
        Route::get('events/pending', [AdminController::class, 'pendingEvents'])->name('events.pending');

        // Approve an event
        Route::patch('events/{event}/approve', [AdminController::class, 'approveEvent'])->name('events.approve');
    });
});

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
