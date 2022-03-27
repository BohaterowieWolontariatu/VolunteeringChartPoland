<?php

use App\Http\Controllers\PointController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SlotController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AgreementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified', 'active', 'agreement'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


// TU DODAJEMY ROUTY. MAJĄ ZABEZPIECZENIE GDY NIE WYPELNIMY POROZUMIENIA
Route::middleware(['auth:sanctum', 'verified', 'active', 'agreement'])->group(function () {
    Route::resource('points', PointController::class);
    Route::resource('languages', LanguageController::class);
    Route::post('slot', SlotController::class)->name('slot.store');
});

// GRUPA ROUTÓW UŻYWANA DO ZATRZYMANIA UŻYTKOWNIKA NA FORMULARZU POROZUMIENIA.
Route::middleware(['auth:sanctum', 'verified', 'active'])->group(function () {
    Route::group(['prefix' => 'agreement'], function () {
        Route::get('/', [AgreementController::class, 'create'])->name('agreement.create');
        Route::post('/', [AgreementController::class, 'store'])->name('agreement.store');
    });
});
