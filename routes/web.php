<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShopController;


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

Route::get('/', [FrontController::class,'index'])->name('index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('home/shop',[ShopController::class,'index'])->middleware('auth')->name('home.shop.index');
Route::get('home/shop/categoria/{categoria}',[ShopController::class,'category'])->middleware('auth')->name('home.shop.categoria');
Route::get('home/shop/{product}',[ShopController::class,'showProduct'])->middleware('auth')->name('home.shop.show');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::resource('admin/categories',CategoryController::class)->middleware('auth')->names('admin.categories');
Route::resource('admin/productos',ProductController::class)->middleware('auth')->names('admin.productos');

