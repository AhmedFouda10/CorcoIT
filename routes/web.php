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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::middleware('guest')->group(function(){
            Route::get('/', function () {
                return view('auth.login');
            });
        });
        
        
        Auth::routes();
        
        Route::middleware('auth')->group(function(){
            Route::get('home', [HomeController::class, 'index'])->name('admin.home');
            Route::resource('category',CategoryController::class);
            Route::resource('news',NewsController::class);
        });
        
});





