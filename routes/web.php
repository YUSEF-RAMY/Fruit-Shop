<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes([
    // 'register' => false,
]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

//all product
Route::get('/', [MainController::class ,'GetAllProduct']);


//all category
Route::get('/category', [MainController::class ,'GetAllCategory']);

// get product by category
Route::get('/products/{cate_id?}', [MainController::class ,'GetCategoryByID']);

// review bage 
Route::get('/reviews', [MainController::class ,'reviews']);
Route::post('/storeReviews', [MainController::class ,'storeReviews']);

// add new product
Route::get('/addproduct' ,[ProductController::class ,'addproduct'])->middleware('auth');
Route::post('/storeproduct' ,[ProductController::class ,'addproductsubmit'])->middleware('auth');

//edit product  you have a problem here
Route::get('/editproduct/{product_id?}' ,[ProductController::class ,'editproduct'])->middleware('auth');

Route::get('/deleteproduct/{productid?}' ,[ProductController::class ,'removeProductSubmit'])->middleware('auth');

// search bar on master bage 
Route::match(['get', 'post'],'/search' ,[MainController::class , 'search']);

