<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\{Book, Genre, Publisher};
use Auth;

class BookController extends Controller
{
    public function books()
    {

        $data = [
            'title' => 'Books',
            'slug' => 'books'
        ];

        return view('admin.books', $data);
    }

    public function add_book()
    {
        $data = [
            'title' => 'Add book',
            'slug' => 'add-book'
        ];

        $genres = Genre::select('id', 'name')->get();

        $data['genres'] = $genres;

        $publishers = Publisher::select('id', 'name')->get();

        $data['publishers'] = $publishers;

        return view('admin.add-book', $data);
    }

    public function edit_book($book_id)
    {

        $data = [
            'title' => '',
            'slug' => '',
            'book_id' => $book_id
        ];

        $genres = Genre::select('id', 'name')->get();

        $data['genres'] = $genres;

        $publishers = Publisher::select('id', 'name')->get();

        $data['publishers'] = $publishers;

        return view('admin.edit-book', $data);
    }
}
