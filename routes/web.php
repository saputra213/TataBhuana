<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScaffoldingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminScaffoldingController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ArticleController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Scaffolding Routes
Route::get('/scaffoldings', [ScaffoldingController::class, 'index'])->name('scaffoldings.index');
Route::get('/scaffoldings/{scaffolding}', [ScaffoldingController::class, 'show'])->name('scaffoldings.show');

// Project Routes
Route::get('/projects', [\App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [\App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');

// Branch Routes
Route::get('/branches', [\App\Http\Controllers\BranchController::class, 'index'])->name('branches.index');
Route::get('/branches/{branch}', [\App\Http\Controllers\BranchController::class, 'show'])->name('branches.show');

// Article Routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/articles/{article}/comment', [ArticleController::class, 'storeComment'])->name('articles.comment.store');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Protected Admin Routes
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
        
        // Scaffolding Management
        Route::resource('scaffoldings', AdminScaffoldingController::class);
        
        // Project Management
        Route::resource('projects', \App\Http\Controllers\Admin\AdminProjectController::class);
        
        // Branch Management
        Route::resource('branches', \App\Http\Controllers\Admin\AdminBranchController::class);
        
        // Article Management
        Route::resource('articles', \App\Http\Controllers\Admin\AdminArticleController::class);

        // Comment Management
        Route::get('/comments', [\App\Http\Controllers\Admin\AdminCommentController::class, 'index'])->name('comments.index');
        Route::put('/comments/{comment}/approve', [\App\Http\Controllers\Admin\AdminCommentController::class, 'approve'])->name('comments.approve');
        Route::delete('/comments/{comment}', [\App\Http\Controllers\Admin\AdminCommentController::class, 'destroy'])->name('comments.destroy');
    });
});
