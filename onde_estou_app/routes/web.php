<?php

use App\Enums\CompaniesStatus;
use App\Http\Controllers\companiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sectorsController;
use App\Http\Controllers\whereamiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('default');
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
    Route::prefix('companies')->group(function () {
        Route::get('/', [companiesController::class, 'index'])->name('companies');
        Route::post('/store', [companiesController::class, 'store'])->name('companies.store');
        Route::get('/create', [companiesController::class, 'create'])->name('companies.create');
        Route::get('/list', [companiesController::class, 'list'])->name('companies.list');
        Route::get('/show/{id}', [companiesController::class, 'show'])->name('companies.show');
        Route::get('/edit/{id}', [companiesController::class, 'edit'])->name('companies.edit');
        Route::post('/update/{id}', [companiesController::class, 'update'])->name('companies.update');
        Route::delete('/delete/{id}', [companiesController::class, 'delete'])->name('companies.delete');
    });

    Route::get('/sectors', [sectorsController::class, 'sectors']);

    Route::get('/location', [whereamiController::class, 'locations']);
});

require __DIR__ . '/auth.php';
