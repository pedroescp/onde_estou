<?php

use App\Http\Controllers\companiesController;
use App\Http\Controllers\locationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sectorsController;
use Illuminate\Support\Facades\Route;



Route::get('/', [locationsController::class, 'index_auth_off'], function () {
    return view('default');
});

Route::get('/onde_estou', [locationsController::class, 'index'], function () {
    return view('locations');
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

    //sectors
    Route::prefix('sectors')->group(function () {
        Route::get('/', [sectorsController::class, 'index'])->name('sectors');
        Route::post('/store', [sectorsController::class, 'store'])->name('sectors.store');
        Route::get('/create', [sectorsController::class, 'create'])->name('sectors.create');
        Route::get('/list', [sectorsController::class, 'list'])->name('sectors.list');
        Route::get('/show/{id}', [sectorsController::class, 'show'])->name('sectors.show');
        Route::get('/edit/{id}', [sectorsController::class, 'edit'])->name('sectors.edit');
        Route::post('/update/{id}', [sectorsController::class, 'update'])->name('sectors.update');
        Route::delete('/delete/{id}', [sectorsController::class, 'delete'])->name('sectors.delete');
    });

    Route::prefix('locations')->group(function () {
        Route::post('/store', [locationsController::class, 'store'])->name('locations.store');
        Route::get('/create', [locationsController::class, 'create'])->name('locations.create');
        Route::get('/list', [locationsController::class, 'list'])->name('locations.list');
        Route::get('/show/{id}', [locationsController::class, 'show'])->name('locations.show');
        Route::get('/edit/{id}', [locationsController::class, 'edit'])->name('locations.edit');
        Route::post('/update/{id}', [locationsController::class, 'update'])->name('locations.update');
        Route::delete('/delete/{id}', [locationsController::class, 'delete'])->name('locations.delete');
    });
    Route::get('/locations', [locationsController::class, 'index'])->name('locations');
});

require __DIR__ . '/auth.php';
