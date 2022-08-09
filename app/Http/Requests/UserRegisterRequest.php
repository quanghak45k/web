<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Mời nhập tên ",
            "email.required" => "Mời nhập email ",
            "email.email" => "Mời nhập đúng email ",
            "password.required" => "Mời nhập password ",
            "email.min" => "password it nhat 6 ky tu ",
            "password.confirmed" => "yeu cau xac nhan password ",
            "password_confirmation.required" => "Mời nhập password_confirmation ",

        ];
    }
}
