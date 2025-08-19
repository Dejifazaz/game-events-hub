<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user && $user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Events
Route::resource('events', EventController::class)->only([
    'index','show','create','store','edit','update','destroy'
]);

// User routes
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/my-events', [UserController::class, 'myEvents'])->name('user.my-events');
});

// Admin routes
Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/events/pending', [AdminController::class, 'pendingEvents'])->name('admin.events.pending');
    Route::patch('/events/{event}/approve', [AdminController::class, 'approveEvent'])->name('admin.events.approve');
    Route::patch('/events/{event}/decline', [AdminController::class, 'declineEvent'])->name('admin.events.decline');

    // Admin user management
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');

    // Admin: my events
    Route::get('/my-events', [AdminController::class, 'myEvents'])->name('admin.my-events');
});

// Contact page
Route::view('/contact', 'contact')->name('contact');

// About page
Route::view('/about', 'about')->name('about');

// Sitemap
Route::get('/sitemap', function () {
    return view('sitemap');
})->name('sitemap');
