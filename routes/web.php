<?php

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


Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login_form'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/books', [\App\Http\Controllers\Admin\BookController::class, 'books']);

    Route::get('/add-book', [\App\Http\Controllers\Admin\BookController::class, 'add_book']);

    Route::get('/book/{book_id}/edit', [\App\Http\Controllers\Admin\BookController::class, 'edit_book']);

    Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout']);
});

Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'home']);

Route::get('/book/{book_id}', [\App\Http\Controllers\Front\HomeController::class, 'book']);

/*Route::get('/import', function () {
    $books = file_get_contents("c:\wamp\www\books.txt");

    $books = json_decode($books, true);

    foreach ($books['data'] as $book) {
        $book['genre_id'] = 1;

        $book['publisher_id'] = 1;
        //dd($book);
        \App\Models\Book::create($book);
    }
});*/
