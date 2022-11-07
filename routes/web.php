<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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

Route::get( '/', function () {
    return view( 'welcome' );
} );

// User routes
Route::post( 'allusers', [UserController::class, 'allUsers'] );

// Brand routes
Route::post( 'allbrands', [BrandController::class, 'allBrands'] );

// Category routes
Route::post( 'allcategories', [CategoryController::class, 'allCategories'] );

// Product routes
Route::post( 'allproducts', [ProductController::class, 'allProducts'] );



// all resource routes
Route::resource( 'users', UserController::class );
Route::resource( 'brands', BrandController::class );
Route::resource( 'categories', CategoryController::class );
Route::resource( 'products', ProductController::class );

Auth::routes();

Route::get( '/test', function () {
    return view( 'admin.layouts.app' );
} );

// Route::get( '/user', function () {
//     return view( 'admin.users.index' );
// } );

Route::get( '/dashboard', [DashboardController::class, 'index'] )->name( 'dashboard' );

Route::get( '/home', [HomeController::class, 'index'] )->name( 'home' );

// added some Route