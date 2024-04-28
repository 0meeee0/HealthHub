<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [UserAuthController::class, 'home'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('register', [UserAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [UserAuthController::class, 'register']);
    Route::get('login', [UserAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserAuthController::class, 'login']);
});
Route::get('about', function(){
    return view('about');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::post('addCategory', [AdminController::class, 'addCategory'])->name('addCategory');
    Route::get('categories', [AdminController::class, 'showCategories'])->name('showCategories');
    Route::get('deleteCat/{id}', [AdminController::class, 'deleteCat'])->name('deleteCat');
    
    Route::post('addProduct', [AdminController::class, 'addProduct'])->name('addProduct');
    Route::get('editProduct/{id}', [AdminController::class, 'editProduct'])->name('editProduct');
    Route::get('deleteProduct/{id}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');
    
    Route::get('productStore', [AdminController::class, 'productStore']);
    Route::post('addCart/{id}', [AdminController::class, 'addCart'])->name('addCart');
    
    Route::get('showCart', [AdminController::class, 'showCart'])->name('showCart');
    Route::get('removeCart/{id}', [AdminController::class, 'removeCart'])->name('removeCart');

    Route::post('checkout', [AdminController::class, 'checkout'])->name('checkout');
});
