<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MessageController;

Route::get('/', [WebsiteController::class, 'index']);
Route::post('/', [WebsiteController::class, 'send'])->name('welcome.send');

Route::resource('skill', SkillController::class);
Route::resource('experience', ExperienceController::class);
Route::resource('portofolio', PortofolioController::class);
Route::resource('blog', BlogController::class);

Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
Route::delete('admin/messages/{id}', [MessageController::class, 'delete']);
