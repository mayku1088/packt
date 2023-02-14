<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use App\Services\BookService;
use App\Http\Requests\StoreBookRequest;
use Validator;
use Str;

class BookController extends Controller
{
    public function get_books(Request $request, BookService $book_service)
    {
        $data = $book_service->get_books($request);

        echo json_encode($data);
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

    public function delete(Request $request)
    {
        $book = Book::find($request->id);

        if ($book->id) {

            $deleted = $book->delete();

            if (!$deleted) {
                return response()->json(['result' => false, 'message' => 'Sorry! Could not delete book!']);
            }

            return response()->json(['result' => true, 'message' => 'Book was deleted successfully.']);
        } else {
            return response()->json(['result' => false, 'message' => __('Book not found!')]);
        }
    }

    public function delete_selected(Request $request)
    {
        $ids = explode(',', $request->ids);

        $total_deleted = 0;

        foreach ($ids as $id) {
            $book = Book::find($id);

            if ($book->id) {
                $deleted = $book->delete();

                if ($deleted) {
                    $total_deleted += 1;
                }
            }
        }

        if (count($ids) == $total_deleted) {

            return response()->json(['result' => true, 'message' => sprintf("%d %s deleted successfully.", $total_deleted, Str::plural('book', $total_deleted))]);
        } else {
            return response()->json(['result' => false, 'message' => 'Sorry! Could not delete some books!']);
        }
    }
}
