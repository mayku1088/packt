<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books()
    {
        return view('admin.books');
    }

    public function add_book()
    {
        return view('admin.add-book');
    }
}
