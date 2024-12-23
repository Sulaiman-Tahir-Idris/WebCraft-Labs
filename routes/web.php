<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::resource('projects', ProjectController::class);


Route::get('/dashboard', function () {
    return view('dashboard'); // Create a 'dashboard.blade.php' file in the resources/views directory.
})->name('dashboard')->middleware(['auth']);

Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');

Route::get('/papers/create', [PaperController::class, 'create'])->name('papers.create');
Route::post('/papers/store', [PaperController::class, 'store'])->name('papers.store');

// Route for the user's personalized portfolio
Route::middleware(['auth'])->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('portfolio');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Define the route for storing a new project
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::resource('papers', PaperController::class);

Route::middleware(['auth'])->group(function () {
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::delete('/papers/{id}', [PaperController::class, 'destroy'])->name('papers.destroy');
});
Route::get('/papers/{id}', [PaperController::class, 'show'])->name('papers.show'); // View paper
Route::delete('/papers/{id}', [PaperController::class, 'destroy'])->name('papers.destroy'); // Delete paper


// Public routes for viewing projects and papers
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/papers', [PaperController::class, 'index'])->name('papers.index');
Route::get('/papers/{id}', [PaperController::class, 'show'])->name('papers.show');

// Authentication routes
require __DIR__.'/auth.php';

// Routes for authenticated users (e.g., uploading projects/papers)
Route::middleware(['auth'])->group(function () {
    // Project management
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

    // Paper management
    Route::get('/papers/create', [PaperController::class, 'create'])->name('papers.create');
    Route::post('/papers', [PaperController::class, 'store'])->name('papers.store');
});

