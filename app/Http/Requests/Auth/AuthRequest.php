<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'     => 'required|email|exists:users,email',
            'password'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Email harus diisi',
            'email.email'       => 'Format email salah',
            'email.exists'      => 'Email tidak terdaftar',
            'password.required' => 'Password harus diisi',
        ];
    }
}
