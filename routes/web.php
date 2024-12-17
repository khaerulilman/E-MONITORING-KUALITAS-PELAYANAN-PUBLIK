<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\InovasiController;

Route::get('/', function () {
    return view('home');
});

// inovasi controller
Route::get('/inovasi', [InovasiController::class, 'index']);

// formulir controller
Route::get('/formulir', [FormulirController::class, 'index']);
Route::post('/formulir/fill_out_survey', [FormulirController::class, 'fill_out_survey']);

// Login Controller
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Controller dengan middleware
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(\App\Http\Middleware\EnsureLoginAccessible::class);

//Dasboard Controller Edit profile
Route::post('/dashboard/update_profile', [DashboardController::class, 'update_profile'])->name('update_profile');

//Dasboard Controller Manajemen Survey
Route::post('/dashboard/manage_survey', [DashboardController::class, 'manage_survey'])->name('manage_survey');
Route::post('/dashboard/edit_survey/{id}', [DashboardController::class, 'edit_survey'])->name('edit_survey');
Route::delete('/delete_survey/{id}', [DashboardController::class, 'delete_survey'])->name('delete_survey');
Route::delete('/delete_formulir_response/{id}/{masyarakat_id}/{survey_id}', [DashboardController::class, 'delete_formulir_response'])->name('delete_formulir_response');




//Dasboard Controller Feedback
Route::post('/dashboard/create_feedback', [DashboardController::class, 'create_feedback'])->name('create_feedback');
