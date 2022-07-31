<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubCategoryController;
use App\Models\SubCategory;
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

Route::prefix('front')->as('front.')->group(function () {
    Route::get('/', function () {
        return view('front.home');
    })->name('home');
    Route::get('/store', [StoreController::class, 'index'])->name('store.index');
});

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('product', ProductController::class);
    Route::post('/products/{product_id}/images/{image_id}/delete', [ProductController::class, 'deleteProductImage'])->name('product.image.delete');
    Route::resource('category', CategoryController::class);
    Route::resource('sub_category', SubCategoryController::class);
});
