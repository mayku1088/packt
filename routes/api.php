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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('get-books', [\App\Http\Controllers\Admin\Api\BookController::class, 'get_books']);

    Route::post('add-book', [\App\Http\Controllers\Admin\Api\BookController::class, 'store_book']);

    Route::delete('book/delete', [\App\Http\Controllers\Admin\Api\BookController::class, 'delete']);

    Route::delete('book/delete-selected', [\App\Http\Controllers\Admin\Api\BookController::class, 'delete_selected']);
});

Route::get('all-books', [\App\Http\Controllers\Front\Api\BookController::class, 'all_books']);

Route::controller(\App\Http\Controllers\Admin\Api\AuthController::class)->group(function () {
    Route::post('login', 'login');
});
