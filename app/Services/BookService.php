<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;

class BookService
{
    public function displayErrors($validator)
    {
        $errors = $validator->errors()->toArray();

        $error_messages = [];
        foreach ($errors as $key => $error) {
            $error_messages[] = [
                'key' => $key,
                'message' => $error[0]
            ];
        }

        return response()->json([
            'result' => false,
            'status_code' => Response::HTTP_BAD_REQUEST,
            'errors' => $error_messages
        ], Response::HTTP_BAD_REQUEST);
    }

    public function store(Request $request)
    {
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

        if ($book) {
            return true;
        } else {
            return false;
        }
    }

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

        return $data;
    }
}
