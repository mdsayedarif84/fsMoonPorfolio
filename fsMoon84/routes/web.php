<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminAuthLoginCheck;
use App\Http\Controllers\Admin\SliderController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[FrontendController::class,'index'])->name('front.index');
// Dashboard & auth login
Auth::routes();
Route::get('/home',[HomeController::class, 'index'])->name('home');

//middleware registration in App\Http\kernel.php
//then goto http\create midlleware AdminAuthLoginCheck 
// Route::group(['middleware'=>'login'],function(){
Route::middleware(['login.check'])->group(function(){
    //category
    Route::get('/category',[CategoryController::class, 'index'])->name('category');
    Route::post('/save/category',[CategoryController::class,'saveCategoryInfo'])->name('new.category');
    Route::get('/manage/category',[CategoryController::class,'manageCategoryInfo'])->name('manage.category');
    Route::get('/unpublished{id}',[CategoryController::class,'inactiveCategory'])->name('unpublished.cat');
    Route::get('/published/{id}',[CategoryController::class,'activeCategory'])->name('published.cat');
    Route::get('/edit/category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/update/category',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::get('/delete/category/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');
    //About
    Route::get('/about',[AboutController::class, 'index'])->name('about');
    Route::post('/save/about',[AboutController::class,'saveAboutInfo'])->name('new.about');
    Route::get('/manage/about',[AboutController::class,'manageAbout'])->name('manage.about');
    Route::get('/inactive{id}',[AboutController::class,'inactiveAbout'])->name('inactive.about');
    Route::get('/active{id}',[AboutController::class,'activeAbout'])->name('active.about');
    Route::get('/edit/about/{id}',[AboutController::class,'editAbout'])->name('edit.about');
    Route::post('/update/about',[AboutController::class,'updateAbout'])->name('update.about');
    Route::post('/delete/about/{id}',[AboutController::class,'deleteAbout'])->name('delete.about');
    //Service
    Route::get('/service',[ServiceController::class, 'index'])->name('add.service');
    Route::post('/save/service',[ServiceController::class, 'store'])->name('new.service');
    //User
    Route::get('/user',[UserController::class, 'index'])->name('add.user');
    Route::post('/save/user',[UserController::class,'sotre'])->name('new.user');
    Route::get('/manage/user',[UserController::class,'manageUserInfo'])->name('manage.user');
    Route::get('/published/{id}',[UserController::class,'inactiveUser'])->name('published.user');
    Route::get('/unpublished/{id}',[UserController::class,'activeUser'])->name('unpublished.user');
    Route::get('/edit/user/{id}',[UserController::class,'editUser'])->name('edit.user');
    Route::post('/update/user',[UserController::class,'userUpdateBasicInfo'])->name('update.user');
    //Emailcheck for user
    Route::get('/email-check/{email}',[UserController::class,'emailCheck'])->name('email-check');
    //Slider
    Route::get('/slider',[SliderController::class, 'index'])->name('add.slider');
    Route::post('/save/slider',[SliderController::class, 'saveSlider'])->name('save.slider');
    Route::get('/manage/slider',[SliderController::class, 'manageSlider'])->name('manage.slider');
    Route::get('/inactive/{id}',[SliderController::class,'inactiveSlider'])->name('inactive.slider');
    Route::get('/active/{id}',[SliderController::class,'activeSlider'])->name('active.slider');
    Route::get('/delete/{id}',[SliderController::class,'deleteSlider'])->name('delete.slider');
    Route::get('/edit/slider/{id}',[SliderController::class,'editSlider'])->name('edit.slider');
    Route::post('/update/slider',[SliderController::class,'sliderUpdateInfo'])->name('update.slider');



});






