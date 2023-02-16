<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\BookService;
use App\Http\Requests\StoreBookRequest;



class BookController extends Controller
{
    public function get_books(Request $request, BookService $book_service)
    {
        $data = $book_service->get_books($request);

        return response()->json($data);
    }

    public function book(Request $request, BookService $book_service)
    {

        $data = $book_service->get_book($request);

        if (!empty($data)) {
            return response()->json(['result' => true, 'data' => $data]);
        } else {
            return response()->json(['result' => false, 'message' => 'No such book exists'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function store_book(StoreBookRequest $request, BookService $book_service)
    {
        $new = true;

        if ($request->has('id')) {
            $new = false;
        }

        $saved = $book_service->store($request);

        if ($saved) {
            $message = 'Book was added successfuly.';

            if (!$new) {
                $message = 'Book was updated successfuly.';
            }

            return response()->json(['result' => true, 'message' => $message]);
        } else {
            return response()->json(['result' => true, 'message' => 'Could not save book'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(Request $request, BookService $book_service)
    {

        $data = $book_service->delete_book($request);


        return response()->json($data);
    }

    public function delete_selected(Request $request, BookService $book_service)
    {
        $data = $book_service->delete_selected($request);

        return response()->json($data);
    }
}
