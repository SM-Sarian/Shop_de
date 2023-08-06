<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PosterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\TermController;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

Route::get('/',[IndexController::class, 'index'])->name('fronts.index');
Route::get('product/{product}',[IndexController::class, 'product'])->name('fronts.product');
Route::get('category/{category}',[IndexController::class, 'category'])->name('fronts.category');
Route::get('search',[IndexController::class, 'searchPage'])->name('fronts.searchPage');
Route::get('cart',[IndexController::class, 'cart'])->name('fronts.cart');
Route::get('recent', [IndexController::class, 'recent'])->name('fronts.recent');
Route::get('discount', [IndexController::class, 'discountProduct'])->name('fronts.discount');
Route::get('about', [IndexController::class, 'about'])->name('fronts.about');
Route::get('contact', [IndexController::class, 'contact'])->name('fronts.contact');
Route::get('terms', [IndexController::class, 'terms'])->name('fronts.terms');

Route::post('cart',[CartController::class, 'storeCart'])->name('carts.storeCart');
Route::post('update.cart',[CartController::class, 'updateCart'])->name('carts.updateCart');
Route::post('remove.cart',[CartController::class, 'removeCart'])->name('carts.removeCart');

Route::post('comment/{product}', [IndexController::class, 'comment'])->name('comment');

Route::middleware(['auth','admin'])->prefix('admin')->group(function (){
    Route::resource('categories',CategoryController::class);
    Route::resource('sliders',SliderController::class);
    Route::resource('posters', PosterController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('comments', CommentController::class);
    Route::post('comment-reply/{comment}', [CommentController::class, 'reply'])->name('comments.reply');
    Route::resource('orders', OrderController::class);
    Route::resource('about', AboutController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('terms', TermController::class);
});

Route::post('request', [CartController::class, 'request'])->name('pay.request')->middleware('auth');
Route::get('callback/pay', [CartController::class, 'verify'])->name('pay.callback');


