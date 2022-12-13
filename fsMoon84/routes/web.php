<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AboutController;
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
Route::get('/',[FrontendController::class,'index'])->name('front.index');
// Dashboard & auth login
Auth::routes();
Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/category',[CategoryController::class, 'index'])->name('category');
Route::post('/save/category',[CategoryController::class,'saveCategoryInfo'])->name('new.category');
Route::get('/manage/category',[CategoryController::class,'manageCategoryInfo'])->name('manage.category');
Route::get('/inactive{id}',[CategoryController::class,'inactiveCategory'])->name('inactive.category');
Route::get('/active{id}',[CategoryController::class,'activeCategory'])->name('active.category');
Route::get('/edit/category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
Route::post('/update/category',[CategoryController::class,'updateCategory'])->name('update.category');
Route::get('/delete/category/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');

Route::get('/about',[AboutController::class, 'index'])->name('about');
Route::post('/save/about',[AboutController::class,'saveAboutInfo'])->name('new.about');

