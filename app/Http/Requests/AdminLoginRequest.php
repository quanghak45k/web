<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => 'required|unique:posts|email',
            'password' => 'required|min:6',
        ];
    }
    public function messages(){
        return [
            'email.required' => 'yeu cau nhap email',
//            'email.unique' => 'Email da ton tai',
//            'email.email' => 'moi nhap dung email',
            'password.required' => 'moi nhap password',
        ];
    }

}
