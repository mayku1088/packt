<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherService
{

    public function get_publishers(Request $request)
    {

        $data = Publisher::select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();

        return $data;
    }
}
