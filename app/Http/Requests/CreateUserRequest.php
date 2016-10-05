<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:12',
            'address' => 'required|max:255',
            'password' => 'required|min:6',
            'avatar' => 'mimes:jpg,jpeg,png,gif,svg',
        ];
    }
}
