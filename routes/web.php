<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);

    Route::get('add-category', [CategoryController::class, 'add']);

    Route::post('/insert-category', [CategoryController::class, 'insert'])->name('insert.category');

    Route::get('/delete-category/{id}' , [CategoryController::class, 'delete'])->name('delete.category');
    Route::get('/edit-category/{id}' , [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/update-category/{id}' , [CategoryController::class, 'update'])->name('update.category');

});