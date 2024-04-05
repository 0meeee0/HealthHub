<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuthController;

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

Route::get('login', [userAuthController::class, 'login'])->name('login');
Route::get('register', [userAuthController::class, 'register'])->name('register');
Route::post('/registerUser', [userAuthController::class, 'registerUser'])->name('registerUser');
Route::post('/loginUser', [userAuthController::class, 'loginUser'])->name('loginUser');
Route::get('/home',[userAuthController::class, 'home']);
Route::get('/logout',[userAuthController::class, 'logout']);