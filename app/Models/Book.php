<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $perPage = 15;

    protected $table = 'book';

    protected $fillable = ['id', 'title', 'author', 'genre', 'description', 'isbn', 'image', 'published', 'publisher'];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        if (strpos($this->image, 'http') === false) {
            return asset('storage/' . $this->image);
        }

        return $this->image;
    }

    protected function published(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('d/m/Y', strtotime($value)),
        );
    }

    public function scopeColumnSort($query, $request)
    {
        $columns = ['', 'title', 'author', 'genre', 'created_at', ''];

        $order_column = $columns[$request->order[0]['column']];

        $order_direction = $request->order[0]['dir'];

        $query = $query->orderBy($order_column, $order_direction);

        return $query;
    }

    public function scopeFilterSearch($query, $request)
    {
        $search_value = $request->search['value'];

        $query = $query->whereRaw("(title like '%$search_value%' OR author like '%$search_value%' OR genre like '%$search_value%')");

        return $query;
    }

    public function scopeFilter($query, $request)
    {

        if (!empty($request->keyword)) {
            $keyword = $request->keyword;

            if ($request->has('atts')) {
                $q = [];

                foreach ($request->atts as $attr) {
                    $q[] = "$attr LIKE '%$keyword%'";
                }

                $like_q = implode(' OR ', $q);

                $query = $query->whereRaw($like_q);
            } else {
                $query = $query->whereRaw("title like '%$keyword%'");
            }
        }

        if (!empty($request->start) && !empty($request->end)) {
            $start = \Carbon\Carbon::createFromFormat('d/m/Y', $request->start)->toDateString();

            $end = \Carbon\Carbon::createFromFormat('d/m/Y', $request->end)->toDateString();

            $query = $query->whereBetween('published', [$start, $end]);
        }

        return $query;
    }
}
