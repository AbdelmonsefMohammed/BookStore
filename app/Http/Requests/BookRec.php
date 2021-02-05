<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRec extends FormRequest
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
            'barCode' => 'required|min:10|max:15',
            'title' => 'required|string|min:3|max:50',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'available' => 'required',
        ];
    }
}
