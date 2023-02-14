<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Services\HelperService;
use Validator;
use Str;

class BookController extends Controller
{
    public function get_books(Request $request)
    {
        $total_books = Book::count();

        $books = Book::select('id', 'title', 'author', 'genre', 'created_at')->columnSort($request)->filterSearch($request)->offset($request->start)->limit($request->length)->get();

        $books_filtered = Book::columnSort($request)->filterSearch($request)->count();

        $book_data = [];


        foreach ($books as $book) {
            $action_string = "<ul>";

            $actions = [
                [
                    'title' => __('Edit book'),
                    'icon' => 'fa fa-edit',
                    'url' => url('/book/book_id/edit'),
                    'class' => 'edit',
                    'status' => '',
                    'data' => ''
                ],
                [
                    'title' => __('Delete book'),
                    'icon' => 'fa fa-trash',
                    'url' => url('/book/book_id/delete'),
                    'class' => 'delete-book',
                    'status' => '',
                    'data' => ''
                ]
            ];

            foreach ($actions as $action) {

                $action_string .= "<li style='list-style-type: none;width: 30px;display:inline-block'><a data-id='{$book->id}' {$action['data']}'{$action['status']}' data-placement='left' class='actions {$action['class']}' href='{$action['url']}' title='{$action['title']}'><i class='{$action['icon']}'></i></a></li>";
            }

            $action_string .= "</ul>";

            $action_string = str_replace('book_id', $book->id, $action_string);

            $book_data[] = [
                $book->id,
                $book->title,
                $book->author,
                $book->genre,
                date('d-m-Y', strtotime($book->created_at)),
                "<div class='text-center relative'>$action_string</div>"
            ];
        }

        $data = [
            'draw' => $request->draw,
            'recordsTotal' => $total_books,
            'recordsFiltered' => $books_filtered,
            'data' => $book_data
        ];

        echo json_encode($data);
    }

    public function store_book(Request $request, HelperService $helperService)
    {
        $new = true;

        if ($request->has('id')) {
            $new = false;
        }

        //Validate
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'isbn' => 'required',
            'published' => 'required|date_format:d/m/Y',
            'publisher' => 'required',
            'description' => 'required'
        ];

        if ($new) {
            $rules['image'] = 'required';
        }

        $messages = [
            'title.required' => 'Title is required',
            'author.required' => 'Author is required',
            'genre.required' => 'Genre is required',
            'isbn.required' => 'ISBN is required',
            'published.required' => 'Published date is required',
            'published.date' => 'Published date should be a valid date',
            'publisher.required' => 'Publisher is required',
            'description.required' => 'Description is required',
            'image.required' => 'Cover image is required'
        ];



        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $helperService->displayErrors($validator);
        }

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'isbn' => $request->isbn,
            'published' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->published)->toDateString(),
            'publisher' => $request->publisher,
            'description' => $request->description
        ];



        if ($request->has('image')) {
            $dir =  'book-covers/' . $request->isbn;

            $image_path = $request->file('image')->store($dir);

            $data['image'] = $image_path;
        }

        $id = $request->has('id') ? $request->id : NULL;

        $book = Book::updateOrCreate(['id' => $id], $data);

        $message = 'Book was added successfuly.';

        if (!$new) {
            $message = 'Book was updated successfuly.';
        }

        return response()->json(['result' => true, 'message' => $message]);
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
