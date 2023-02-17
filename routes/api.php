<?php

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

Route::get('books', [\App\Http\Controllers\Front\Api\BookController::class, 'all_books']);

Route::get('book', [\App\Http\Controllers\Front\Api\BookController::class, 'book']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('book/all', [\App\Http\Controllers\Admin\Api\BookController::class, 'get_books']);

    Route::post('book/save', [\App\Http\Controllers\Admin\Api\BookController::class, 'store_book'])->middleware('XssSanitizer');

    Route::get('book/single', [\App\Http\Controllers\Admin\Api\BookController::class, 'book']);

    Route::delete('book/delete', [\App\Http\Controllers\Admin\Api\BookController::class, 'delete']);

    Route::delete('book/delete-selected', [\App\Http\Controllers\Admin\Api\BookController::class, 'delete_selected']);

    Route::get('genre/all', [\App\Http\Controllers\Admin\Api\BookController::class, 'get_genres']);

    Route::get('publisher/all', [\App\Http\Controllers\Admin\Api\BookController::class, 'get_publishers']);
});



Route::controller(\App\Http\Controllers\Admin\Api\AuthController::class)->group(function () {
    Route::post('login', 'login');
});
