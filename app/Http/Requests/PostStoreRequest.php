<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|max:255',
            'cat_id' => 'required|exists:categories,id',
            'description' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Handlomasi kiritlmadi',
            'cat_id.required' => 'Kategoriya kiritlmadi',
            'description.required' => 'Opisaniyasi kiritlmadi',
            'image.required' => 'Rasm kiritlmadi',
            'image.mimes' => 'Rasm bu formatda bolish kerak: jpeg, png, jpg, gif',
            'image.max' => 'Rasm juddayam kotta',
            'title.max' => 'Handlomasi 255-ta harfdan kichik bolishi lozim',
            'description.max' => 'Opisaniyasi 255-ta harfdan kichik bolishi lozim',
            'cat_id.exists' => 'Kategoriya topilmadi',
        ];
    }
}
