<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuthController;
use App\Http\Controllers\adminController;

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

Route::get('register', [userAuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [userAuthController::class, 'register']);
Route::get('login', [UserAuthController::class, 'showLoginForm']);
Route::post('/login', [UserAuthController::class, 'login'])->middleware('web')->name('login');
// Route::post('/logout', [UserAuthController::class, 'logout'])->middleware('web')->name('logut');

Route::post('logout', [UserAuthController::class, 'logout'])->name('logout');
Route::get('home', [userAuthController::class, 'home'])->name('home');
Route::get('dashboard', [adminController::class, 'dashboard'])->name('dashboard');

Route::post('addCategory', [adminController::class, 'addCategory'])->name('addCategory');
Route::get('categories', [adminController::class, 'showCategories'])->name('showCategories');
Route::get('deleteCat/{id}', [adminController::class, 'deleteCat'])->name('deleteCat');

Route::post('addProduct', [adminController::class, 'addProduct'])->name('addProduct');
Route::get('editProduct/{id}', [adminController::class, 'editProduct'])->name('editProduct');
Route::get('deleteProduct/{id}', [adminController::class, 'deleteProduct'])->name('deleteProduct');

Route::get('productStore', [adminController::class, 'productStore']);
Route::POST('addCart/{id}', [adminController::class, 'addCart'])->name('addCart');

Route::GET('showCart', [adminController::class, 'showCart'])->name('showCart');
Route::GET('removeCart/{id}', [adminController::class, 'removeCart'])->name('removeCart');