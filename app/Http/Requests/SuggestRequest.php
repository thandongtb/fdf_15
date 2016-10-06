<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuggestRequest extends FormRequest
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
            'image' => 'required|mimes:jpg,jpeg,png,gif,svg',
        ];
    }
}
