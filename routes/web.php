<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScaffoldingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminScaffoldingController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\ArticleController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/sitemap.xml', function () {
    $urls = [];
    $urls[] = ['loc' => url(route('home')), 'priority' => '1.0'];
    $urls[] = ['loc' => url(route('about')), 'priority' => '0.8'];
    $urls[] = ['loc' => url(route('services')), 'priority' => '0.8'];
    $urls[] = ['loc' => url(route('contact')), 'priority' => '0.6'];
    $urls[] = ['loc' => url(route('scaffoldings.index')), 'priority' => '0.9'];
    $urls[] = ['loc' => url(route('projects.index')), 'priority' => '0.9'];
    $urls[] = ['loc' => url(route('articles.index')), 'priority' => '0.7'];
    $urls[] = ['loc' => url(route('branches.index')), 'priority' => '0.6'];
    foreach (\App\Models\Scaffolding::select('id','updated_at')->get() as $item) {
        $urls[] = ['loc' => url(route('scaffoldings.show', $item)), 'lastmod' => optional($item->updated_at)->toAtomString(), 'priority' => '0.7'];
    }
    foreach (\App\Models\Project::select('id','updated_at')->get() as $item) {
        $urls[] = ['loc' => url(route('projects.show', $item)), 'lastmod' => optional($item->updated_at)->toAtomString(), 'priority' => '0.7'];
    }
    foreach (\App\Models\Article::select('id','updated_at')->get() as $item) {
        $urls[] = ['loc' => url(route('articles.show', $item)), 'lastmod' => optional($item->updated_at)->toAtomString(), 'priority' => '0.6'];
    }
    foreach (\App\Models\Branch::select('id','updated_at')->get() as $item) {
        $urls[] = ['loc' => url(route('branches.show', $item)), 'lastmod' => optional($item->updated_at)->toAtomString(), 'priority' => '0.5'];
    }
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($urls as $u) {
        $xml .= '<url>';
        $xml .= '<loc>'.htmlspecialchars($u['loc'], ENT_XML1).'</loc>';
        if (!empty($u['lastmod'])) $xml .= '<lastmod>'.$u['lastmod'].'</lastmod>';
        if (!empty($u['priority'])) $xml .= '<priority>'.$u['priority'].'</priority>';
        $xml .= '</url>';
    }
    $xml .= '</urlset>';
    return response($xml, 200)->header('Content-Type', 'application/xml');
});

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
    Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest:admin')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware(['guest:admin','throttle:6,1']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/password/forgot', [AuthController::class, 'showForgotPasswordForm'])->middleware('guest:admin')->name('password.request');
    Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->middleware(['guest:admin','throttle:3,1'])->name('password.email');
    Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->middleware('guest:admin')->name('password.reset');
    Route::post('/password/reset', [AuthController::class, 'resetPassword'])->middleware(['guest:admin','throttle:6,1'])->name('password.update');
    
    // Protected Admin Routes
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');

        Route::get('/home', [AdminController::class, 'home'])->name('home');
        Route::post('/home', [AdminController::class, 'updateHome'])->name('home.update');

        Route::get('/hero', [AdminController::class, 'hero'])->name('hero');
        Route::post('/hero', [AdminController::class, 'updateHero'])->name('hero.update');

        Route::get('/footer', [FooterController::class, 'index'])->name('footer.index');
        Route::post('/footer', [FooterController::class, 'update'])->name('footer.update');

        // About Page Management
        Route::get('/about', [\App\Http\Controllers\Admin\AboutController::class, 'index'])->name('about.index');
        Route::post('/about', [\App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');

        // Services Page Management
        Route::get('/services-settings', [\App\Http\Controllers\Admin\ServicePageController::class, 'index'])->name('services.index');
        Route::post('/services-settings', [\App\Http\Controllers\Admin\ServicePageController::class, 'update'])->name('services.update');
        
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
