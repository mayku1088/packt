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

        $data = Book::select('book.id', 'title', 'author', 'g.name as genre', 'image')
            ->join('genre as g', 'g.id', '=', 'book.genre_id')
            ->filter($request)
            ->orderBy('book.created_at', 'desc')
            ->paginate();

        return response()->json(['result' => true, 'data' => $data]);
    }

    public function book(Request $request)
    {

        $data = Book::select('title', 'author', 'g.name as genre', 'image', 'isbn', 'published', 'p.name as publisher', 'description')
            ->join('genre as g', 'g.id', '=', 'book.genre_id')
            ->join('publisher as p', 'p.id', '=', 'book.publisher_id')->find($request->book_id);

        if (!empty($data)) {
            return response()->json(['result' => true, 'data' => $data]);
        } else {
            return response()->json(['result' => false, 'message' => 'No such book exists'], Response::HTTP_BAD_REQUEST);
        }
    }
}
