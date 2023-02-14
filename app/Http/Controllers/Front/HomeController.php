<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function book($book_id)
    {

        return view('front.book', ['book_id' => $book_id]);
    }
}
