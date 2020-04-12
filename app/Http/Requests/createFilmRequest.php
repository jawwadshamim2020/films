<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createFilmRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'           => 'required|unique:films|regex:/^[\s\w-]*$/|max:200',
            'description'    => 'required',
            'release_date'   => 'required|date',
            'rating'         => 'required|numeric|min:1|max:5',
            'ticket_price'   => 'required|numeric|min:1',
            'country'        => 'required',
            'genre'          => 'required',
            'film_image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
