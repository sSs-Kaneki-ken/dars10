<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|max:20'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ismingizni kiriting!',
            'email.required' => 'Emaylni kiriting!',
            'password.required' => 'Parolni kiriting!',
            'password.min' => 'Parol 6-ta harfdan kichik bolishi kerak emas!',
            'password.max' => 'Perol 20-ta harfdan kichik bolishi kerak!',
            'email.unique' => 'Bunaqa emayl bor!'
        ];
    }
}
