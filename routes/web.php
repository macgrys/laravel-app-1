<?php

use App\Account\Presentation\Controllers\Http\AccountHttpController;
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

Route::get('/', [AccountHttpController::class, 'loginForm']);
Route::get('/register', [AccountHttpController::class, 'registerForm']);
Route::post('/login', [AccountHttpController::class, 'login']);
Route::post('/register', [AccountHttpController::class, 'register']);
Route::get('/dashboard', [AccountHttpController::class, 'dashboard']);
