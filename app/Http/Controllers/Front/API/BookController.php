<?php

namespace App\Http\Controllers\Front\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use Illuminate\Pagination\Paginator;


class BookController extends Controller
{
    public function all_books(Request $request)
    {
        $current_page = $request->page;

        Paginator::currentPageResolver(function () use ($current_page) {
            return $current_page;
        });

        $data = Book::filter($request)->paginate();

        return response()->json($data);
    }
}
