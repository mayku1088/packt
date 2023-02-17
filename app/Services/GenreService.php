<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreService
{

    public function get_genres(Request $request)
    {

        $data = Genre::select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();

        return $data;
    }
}
