<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogisticsController;
use App\Http\Middleware\AdminMiddleware;
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

Route::match(['get', 'post'], '/home', [LogisticsController::class, 'homePage']);

Route::match(['get', 'post'], '/about', [LogisticsController::class, 'aboutUs']);

Route::match(['get', 'post'], '/quote', [LogisticsController::class, 'requestQuote']);

Route::match(['get', 'POST'], '/estimate', [LogisticsController::class, 'getEstimate'])->name('estimate');

Route::match(['get', 'post'], '/order', [LogisticsController::class, 'placeOrder']);

Route::match(['get', 'post'], '/track', [LogisticsController::class, 'trackParcel']);

Route::match(['get', 'post'], '/blog', [LogisticsController::class, 'blogPage']);

Route::match(['get', 'post'], '/contact', [LogisticsController::class, 'contactUs']);




Route::match(['get', 'post'], '/signup', [AdminController::class, 'signUp']);

Route::match(['get', 'post'], '/login', [AdminController::class, 'adminLogin'])->name('login');

Route::match(['get', 'post'], '/logout', [AdminController::class, 'logout']);

Route::match(['get', 'post'], '/dashboard', [AdminController::class, 'showDashboard'])->middleware('auth');

Route::match(['get', 'post'], '/adminContact', [AdminController::class, 'adminCont'])->middleware('auth');

Route::match(['get', 'post'], '/adminBlog', [AdminController::class, 'adminblog'])->middleware('auth');

Route::match(['get', 'post'], '/adminOrder', [AdminController::class, 'adminorder'])->middleware('auth');

Route::match(['get', 'post'], '/showDetails', [AdminController::class, 'showdetail'])->middleware('auth');

Route::match(['get', 'post'], '/addBlog', [AdminController::class, 'addblog'])->middleware('auth');

Route::match(['get', 'post'], '/adminAbout', [AdminController::class, 'adminabout'])->middleware('auth');

Route::match(['get', 'post'], '/editAbout', [AdminController::class, 'editabout'])->middleware('auth');

Route::match(['get', 'post'], '/calculator', [AdminController::class, 'Calculator'])->middleware('auth');

Route::match(['get', 'post'], '/adminOr', [AdminController::class, 'adminor'])->middleware('auth');

Route::any('/edit/{id}', [AdminController::class, 'Edit'])->middleware('auth');

Route::any('/delete/{id}', [AdminController::class, 'Delete']);