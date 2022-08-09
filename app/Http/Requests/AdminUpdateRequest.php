<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable|min:6',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Mời nhập tên ",
            "email.required" => "Mời nhập email ",
            "password.min" => "it nha 6 ky tu ",

        ];
    }
}
