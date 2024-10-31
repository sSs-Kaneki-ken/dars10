<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title' => 'max:255',
            'description' => 'max:255',
            'cat_id' => 'exists:categories,id',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.max' => 'Handloha 255-ta harfdan kichik bolish kerak!',
            'description.max' => 'Opisaniya 255-ta harfdan bolish kerak!',
            'cat_id.exists' => 'Kategoriya topilmadi!',
            'image.image' => 'Rasm joylang!',
            'image.mimes' => 'Rasm (jpeg, jpg, png, gif, svg) formatda bolish lozim!'
        ];
    }
}
