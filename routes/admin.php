<?php

use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

Route::resource('users', UserController::class)->except(['create', 'store', 'show', 'destroy',]);
Route::resource('points', PointController::class);

Route::redirect('/', \route('admin.users.index'));

