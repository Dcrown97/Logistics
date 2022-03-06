<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogisticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::match(['get', 'post'], '/blogs', [LogisticsController::class, 'blogs']);

Route::match(['get', 'post'], '/blog_single/{id}', [LogisticsController::class, 'blog_single']);

Route::match(['get', 'post'], '/create_blog', [AdminController::class, 'addblog']);

Route::match(['get', 'post', 'PUT'], '/edit_blog', [AdminController::class, 'Edit']);
