<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

Route::get('/', function () {
    return view('welcome');
});
|
*/

Route::get('/',[PagesController::class, 'welcome'])->name('welcome');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::get('/about',[PagesController::class, 'about'])->name('about');
Route::get('/brand',[PagesController::class, 'brand'])->name('brand');
Route::get('/individual/{id}',[PagesController::class, 'individual'])->name('individual');
Route::get('/contact',[PagesController::class, 'contact'])->name('contact');
Route::get('/special',[PagesController::class, 'special'])->name('special');
//Route::get('/checkout/{id}',[PagesController::class, 'checkout'])->name('checkout');
Route::post('/buyer', [PagesController::class, 'storeBuyer']);

//Cart routs
Route::get('/cart/index',[CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}',[CartController::class, 'addItem']);
Route::get('/cart/remove/{id}',[CartController::class, 'removeItem']);

//Payment rout
Route::get('/checkout',[CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout',[CheckoutController::class, 'store'])->name('checkout.store');

//Confrirmaton rout
Route::get('/confirmation',[ConfirmationController::class, 'index'])->name('confirmation.index');

//TO make Auth work add <script src="{{ asset('js/app.js') }}" defer></script> to app.blade.php 
// Auth::routes();
Route::middleware('auth')->group(function (){});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
