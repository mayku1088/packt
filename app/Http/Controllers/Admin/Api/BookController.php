<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

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
                    'url' => url('/vendor/vendor_id/edit'),
                    'class' => 'edit',
                    'status' => '',
                    'data' => ''
                ],
                [
                    'title' => __('Delete book'),
                    'icon' => 'fa fa-trash',
                    'url' => url('/vendor/vendor_id/delete'),
                    'class' => 'delete-vendor',
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

    public function add_book(Request $request)
    {
        //Validate

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'isbn' => $request->isbn,
            'published' => '2018-09-18',
            'publisher' => $request->publisher,
            'description' => $request->description
        ];

        Book::create($data);
    }
}
