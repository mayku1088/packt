<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;

class BookService
{

    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'genre_id' => $request->genre_id,
            'isbn' => $request->isbn,
            'published' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->published)->toDateString(),
            'publisher_id' => $request->publisher_id,
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

        $books = Book::select('book.id', 'title', 'author', 'g.name as genre', 'book.created_at')
            ->join('genre as g', 'g.id', '=', 'book.genre_id')
            ->columnSort($request)
            ->filterSearch($request)
            ->offset($request->start)
            ->limit($request->length)
            ->get();

        $books_filtered = Book::join('genre as g', 'g.id', '=', 'book.genre_id')->columnSort($request)->filterSearch($request)->count();

        $book_data = [];


        foreach ($books as $book) {

            $book_data[] = [
                $book->id,
                $book->title,
                $book->author,
                $book->genre,
                date('d-m-Y', strtotime($book->created_at))
            ];
        }

        $data = [
            'status' => true,
            'draw' => $request->draw,
            'recordsTotal' => $total_books,
            'recordsFiltered' => $books_filtered,
            'data' => $book_data
        ];

        return $data;
    }
}
