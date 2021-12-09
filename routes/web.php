<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController as FrontendFrontendController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontendController::class, 'index']);

Route::get('/category', [FrontendController::class, 'category'])->name('category');

Route::get('/view-category/{slug}', [FrontendController::class, 'category_products_view']);

Route::get('products-details/{category_slug}/{product_slug}', [FrontendController::class, 'product_details']);

Route::post('/add-to-cart', [CartController::class, 'addProductToCart'])->name('addToCart');

Route::post('remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');

Route::post('update-cart', [CartController::class, 'update'])->name('update.cart');


Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewCart']);
});

Auth::routes();

Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('login');



Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index']);

    // Category Route
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('/insert-category', [CategoryController::class, 'insert'])->name('insert.category');
    Route::get('/delete-category/{id}' , [CategoryController::class, 'delete'])->name('delete.category');
    Route::get('/edit-category/{id}' , [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/update-category/{id}' , [CategoryController::class, 'update'])->name('update.category');


    // Product Route
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/add-products', [ProductController::class, 'add'])->name('add.products');
    Route::post('/insert-product', [ProductController::class, 'insert'])->name('insert.product');
    Route::get('/edit-product/{id}' , [ProductController::class, 'edit'])->name('edit.product');
    Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::get('/delete-product/{id}' , [ProductController::class, 'delete'])->name('delete.product');



});
