<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'exists:categories,id',
            'image' => 'mimes:jpg,jpeg,png,gif,svg',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
        ];
    }
}
