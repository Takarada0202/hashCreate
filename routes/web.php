<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hashController;
use App\Jobs\insertHashEvent;
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


Route::get('/', [hashController::class, 'index']);
Route::get('/create', [hashController::class, 'hashCreate']);
