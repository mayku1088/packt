<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $rules = [
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'isbn' => 'required',
            'published' => 'required|date_format:d/m/Y',
            'publisher' => 'required',
            'description' => 'required'
        ];



        $new = true;

        if ($this->has('id')) {
            $new = false;
        }

        if ($new) {
            $rules['image'] = 'required|image';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'author.required' => 'Author is required',
            'genre.required' => 'Genre is required',
            'isbn.required' => 'ISBN is required',
            'published.required' => 'Published date is required',
            'published.date' => 'Published date should be a valid date',
            'publisher.required' => 'Publisher is required',
            'description.required' => 'Description is required',
            'image.required' => 'Cover image is required',
            'image.image' => 'Cover image should only be of type image'
        ];
    }
}
