<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;

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

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// 商品詳細画面へのルート
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// 商品更新の処理ルート
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// 商品登録画面の表示ルート
Route::get('/register', [ProductController::class, 'register'])->name('products.register');

// 商品登録の処理ルート（POST）を追加
Route::post('/register', [ProductController::class, 'store'])->name('products.store');

// 商品削除のルート
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
