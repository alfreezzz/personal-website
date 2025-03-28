<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MessageController;

// Guest & Admin (WebsiteController)
Route::get('/', [WebsiteController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/', [WebsiteController::class, 'send'])->name('welcome.send');

// Hanya Admin
Route::middleware('admin')->group(function () {
    Route::resource('skill', SkillController::class);
    Route::resource('experience', ExperienceController::class);
    Route::resource('portofolio', PortofolioController::class);

    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::delete('admin/messages/{id}', [MessageController::class, 'delete'])->name('admin.messages.delete');
});

Route::middleware('admin')->prefix('admin/blog')->group(function () {
    Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/edit/{slug}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/update/{slug}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
});
