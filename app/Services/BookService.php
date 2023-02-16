<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Pagination\Paginator;
use Str;

class BookService
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
            ->orderBy('book.id', 'desc')
            ->paginate();

        return $data;
    }

    public function book(Request $request)
    {

        $book = Book::select('book.id', 'title', 'author', 'g.name as genre', 'image', 'isbn', 'published', 'p.name as publisher', 'description')
            ->join('genre as g', 'g.id', '=', 'book.genre_id')
            ->join('publisher as p', 'p.id', '=', 'book.publisher_id')->find($request->book_id);

        return $book;
    }

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

    public function get_book(Request $request)
    {
        $book = Book::select('book.id', 'title', 'author', 'genre_id', 'image', 'isbn', 'published', 'publisher_id', 'description')->find($request->book_id);

        return $book;
    }

    public function delete_book(Request $request)
    {
        Book::where('id', $request->id)->delete();

        return ['result' => true, 'message' => 'Book deleted successfully'];
    }

    public function delete_selected(Request $request)
    {
        $ids = explode(',', $request->ids);

        Book::whereIn('id', $ids)->delete();

        return ['result' => true, 'message' => sprintf("%d %s deleted successfully.", count($ids), Str::plural('book', count($ids)))];
    }
}
