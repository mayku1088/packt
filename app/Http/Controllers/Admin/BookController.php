<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Book;
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

        return view('admin.add-book', $data);
    }

    public function edit_book($book_id)
    {

        $book = Book::find($book_id);

        $data = [
            'title' => 'Edit ' . $book->title,
            'book' => $book,
            'slug' => ''
        ];

        return view('admin.edit-book', $data);
    }
}
