<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProizvodstvoController;
use App\Http\Controllers\AboutController;

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
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{slug}', [ProductController::class, 'show_cat'])->name('product_cat');
Route::get('/product/{slug}', [ProductPageController::class, 'index'])->name('product_page');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
Route::get('/proizvodstvo', [ProizvodstvoController::class, 'index'])->name('proizvodstvo');
Route::get('/about', [AboutController::class, 'index'])->name('about');
