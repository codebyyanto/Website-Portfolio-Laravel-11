<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/project/{project}', [HomeController::class, 'show'])->name('projects.show');

// Admin Routes (Optional: Add middleware later)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class);
});
