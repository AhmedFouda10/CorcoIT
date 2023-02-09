<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SubcategoryController;

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

// Route::middleware('auth')->prefix('admin')->name('admin')
Route::get('home', [HomeController::class, 'index'])->name('admin.home');
// Route::get('subcategories/all', [SubcategoryController::class, 'all'])->name('admin.subcategories.all');
// Route::get('subcategories/create', [SubcategoryController::class, 'create'])->name('admin.subcategories.create');
// Route::post('subcategories/store', [SubcategoryController::class, 'store'])->name('admin.subcategories.store');
// Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');


Route::resource('category',CategoryController::class);
Route::resource('news',NewsController::class);
Route::get('news/destroy/{id}',[NewsController::class,'destroy'])->name('news.destroy');


