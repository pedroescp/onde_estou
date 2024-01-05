<?php

use App\Http\Controllers\companiesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sectorsController;
use App\Http\Controllers\whereamiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/onde_estou', function () {
    return view('onde_estou');
})->middleware(['auth', 'verified'])->name('onde_estou');

Route::middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //companies
    Route::get('/companies', [companiesController::class, 'companies']);

    Route::get('/sectors', [sectorsController::class, 'sectors']);

    Route::get('/location', [whereamiController::class, 'locations']);
});

require __DIR__ . '/auth.php';
