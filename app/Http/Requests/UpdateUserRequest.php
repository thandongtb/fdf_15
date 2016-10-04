<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'email|unique:users',
            'avatar' => 'mimes:jpeg,jpg,png|max:1000',
            'address' => 'required|max:255',
            'phone' => 'required|regex:/(0)[0-9]{9}/|'
        ];
    }
}
