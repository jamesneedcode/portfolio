<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProjectAdminController;
use App\Http\Controllers\Admin\SkillAdminController;
use Illuminate\Support\Facades\Route;

// ─── Public Portfolio ────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

// ─── Projects JSON API ───────────────────────────────────────────
Route::prefix('api')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('api.projects');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('api.projects.show');
});

// ─── Admin Auth ──────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware(\App\Http\Middleware\AdminAuthenticated::class)->group(function () {
        Route::get('/dashboard', function () {
            $projectCount = \App\Models\Project::count();
            $skillCount   = \App\Models\Skill::count();
            $featured     = \App\Models\Project::where('featured', true)->count();
            return view('admin.dashboard', compact('projectCount', 'skillCount', 'featured'));
        })->name('dashboard');

        Route::resource('projects', ProjectAdminController::class)->names([
            'index'   => 'projects.index',
            'create'  => 'projects.create',
            'store'   => 'projects.store',
            'show'    => 'projects.show',
            'edit'    => 'projects.edit',
            'update'  => 'projects.update',
            'destroy' => 'projects.destroy',
        ]);

        Route::resource('skills', SkillAdminController::class)->names([
            'index'   => 'skills.index',
            'create'  => 'skills.create',
            'store'   => 'skills.store',
            'show'    => 'skills.show',
            'edit'    => 'skills.edit',
            'update'  => 'skills.update',
            'destroy' => 'skills.destroy',
        ]);
    });
});
