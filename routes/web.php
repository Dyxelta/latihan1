<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use Illuminate\Support\Facades\App;
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

Route::get('/', function() {
    return view('guest.landing');
})->middleware('guest')->name('landing');

Route::get('/register', function() {
    App::setLocale('en');
    return view('guest.register');
})->middleware('guest')->name('register');

Route::get('/register/id', function() {
    App::setLocale('id');
    return view('guest.register');
})->middleware('guest')->name('registerid');

Route::get('/login', function() {
    return view('guest.login');
})->middleware('guest')->name('login');

Route::post('/register-account', [UserController::class, 'registerAccount'])->name('registerAccount');

Route::post('/login-account', [UserController::class, 'loginAccount'])->name('loginAccount');

Route::get('/home', [ProductController::class, 'getAllProducts'])->name('home');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::put('/update-profile/{user:id}', [UserController::class, 'updateProfile'])->name('updateProfile');

Route::get('/detail/{product:id}', [ProductController::class, 'productDetail'])->name('detail');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart');

Route::post('/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('addToCart');

Route::delete('/delete-cart-item/{cart:id}', [CartController::class, 'delete'])->name('deleteCartItem');

Route::delete('/Checkout', [CartController::class, 'checkOut'])->name('checkout');

Route::middleware(AdminMiddleware::class)->group(function() {

    Route::get('/account', [UserController::class, 'getAllUser'])->name('account');

    Route::delete('/delete-user/{user:id}', [UserController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/change-role/{user:id}', [UserController::class, 'userById'])->name('changeRole');

    Route::put('/update-role/{user:id}', [UserController::class, 'updateUser'])->name('updateUser');
});



