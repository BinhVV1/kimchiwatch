<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('/san-pham', [App\Http\Controllers\ProductController::class, 'product'])->name('product');
Route::get('/san-pham/{link}/', [App\Http\Controllers\ProductController::class, 'productDetail'])->name('productDetail');
Route::get('/lien-he', function () {
    return view('contact');
});

Route::get('/tin-tuc', [App\Http\Controllers\ProductController::class, 'news'])->name('news');
Route::get('/tin-tuc/{link}', [App\Http\Controllers\ProductController::class, 'newsDetail'])->name('newsDetail');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'product'])->name('product');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('/admin/them-san-pham/', [App\Http\Controllers\HomeController::class, 'addProduct'])->name('addProduct');
Route::get('/admin/sua-san-pham/{id}', [App\Http\Controllers\HomeController::class, 'editProduct'])->name('editProduct');
Route::post('/admin/postAddOrEditProduct/', [App\Http\Controllers\HomeController::class, 'postAddOrEditProduct'])->name('postAddOrEditProduct');
Route::get('/admin/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteProduct'])->name('deleteProduct');
Route::get('/admin/delete-images/{id}/{value}', [App\Http\Controllers\HomeController::class, 'deleteImage'])->name('deleteImage');

Route::get('/admin/news', [App\Http\Controllers\HomeController::class, 'news']);
Route::get('/admin/news/them-tin-tuc/', [App\Http\Controllers\HomeController::class, 'addOrEditnews']);
Route::get('/admin/news/sua-tin-tuc/{id}', [App\Http\Controllers\HomeController::class, 'addOrEditnews']);
Route::post('/admin/news/postNews', [App\Http\Controllers\HomeController::class, 'postAddOrEditNews'])->name('postAddOrEditNews');
Route::get('/admin/news/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteNews']);

Route::get('/admin/slide', [App\Http\Controllers\HomeController::class, 'slide'])->name('slide');
Route::post('/admin/postSlide', [App\Http\Controllers\HomeController::class, 'postSlide'])->name('postSlide');
Route::get('/admin/delete-images-slide/{dv}/{id}/{value}', [App\Http\Controllers\HomeController::class, 'deleteSlide'])->name('deleteSlide');