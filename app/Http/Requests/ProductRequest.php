<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|numeric',
            'sub_id' => 'required|numeric',
            'name' => 'required|min:3|max:255',
            'good_price' => 'required|numeric',
            'bad_price' => 'required|numeric',
            'code' => 'required|string|max:20',
            'year' => 'required|numeric'
        ];
    }
}
