<?php

namespace App\Http\Controllers\Front\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\BookService;



class BookController extends Controller
{
    public function all_books(Request $request, BookService $book_service)
    {

        $data = $book_service->all_books($request);

        return response()->json(['result' => true, 'data' => $data]);
    }

    public function book(Request $request, BookService $book_service)
    {

        $data = $book_service->book($request);

        if (!empty($data)) {
            return response()->json(['result' => true, 'data' => $data]);
        } else {
            return response()->json(['result' => false, 'message' => 'No such book exists'], Response::HTTP_BAD_REQUEST);
        }
    }
}
