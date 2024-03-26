<?php

use App\Http\Controllers\Api\CompaniesController;
use App\Http\Controllers\Api\SectorsController;
use App\Http\Controllers\locationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//companies
Route::prefix('companies')->group(function () {
    Route::get('/', [CompaniesController::class, 'index'])->name('companies.index');
    Route::get('/list', [CompaniesController::class, 'index'])->name('companies.index');
    Route::get('/{id}', [CompaniesController::class, 'show'])->name('companies.show');
    Route::post('/store', [CompaniesController::class, 'store'])->name('companies.store');
    Route::delete('/{id}', [CompaniesController::class, 'destroy'])->name('companies.destroy');
    Route::put('/{id}', [CompaniesController::class, 'update'])->name('companies.update');
});

Route::prefix('sectors')->group(function () { 
    Route::get('/', [SectorsController::class, 'index'])->name('index.index');
    Route::get('/company/{id}', [SectorsController::class, 'company'])->name('company.index');
});

Route::prefix('locations')->group(function () {
    Route::post('/update/sectororigin/{id}', [locationsController::class, 'updateOrigin'])->name('locations.updateOrigin');
});

Route::get('/sectors', [SectorsController::class, 'index']);
