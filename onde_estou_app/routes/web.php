<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\WhereAmIController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Sectors
    Route::prefix('sectors')->group(function () {
        Route::get('/', [SectorController::class, 'index'])->name('sectors.index');
        Route::get('/create', [SectorController::class, 'create'])->name('sectors.create');
        Route::post('/', [SectorController::class, 'store'])->name('sectors.store');
        Route::get('/{sector}/edit', [SectorController::class, 'edit'])->name('sectors.edit');
        Route::patch('/{sector}', [SectorController::class, 'update'])->name('sectors.update');
        Route::delete('/{sector}', [SectorController::class, 'destroy'])->name('sectors.destroy');
    });
    
    //Companies
    Route::prefix('companies')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('companies.index');
        Route::get('/create', [CompanyController::class, 'create'])->name('companies.create');
        Route::post('/', [CompanyController::class, 'store'])->name('companies.store');
        Route::get('/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
        Route::patch('/{company}', [CompanyController::class, 'update'])->name('companies.update');
        Route::delete('/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    });
    
    //Where_am_i
    Route::prefix('where_am_i')->group(function () {
        Route::get('/', [WhereAmIController::class, 'index'])->name('where_am_i.index');
        Route::get('/create', [WhereAmIController::class, 'create'])->name('where_am_i.create');
        Route::post('/', [WhereAmIController::class, 'store'])->name('where_am_i.store');
        Route::get('/{location}/edit', [WhereAmIController::class, 'edit'])->name('where_am_i.edit');
        Route::patch('/{location}', [WhereAmIController::class, 'update'])->name('where_am_i.update');
        Route::delete('/{location}', [WhereAmIController::class, 'destroy'])->name('where_am_i.destroy');
    });
});

require __DIR__ . '/auth.php';
