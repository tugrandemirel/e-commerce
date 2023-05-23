<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'meta_title' => 'required|string|max:55',
            'meta_description' => 'required|string|max:155',
            'meta_keywords' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Kategori Başlık alanı zorunludur.',
            'name.string' => 'Kategori Başlık alanı metin tipinde olmalıdır.',
            'name.max' => 'Kategori Başlık alanı en fazla 255 karakter olmalıdır.',
            'image.image' => 'Resim alanı resim dosyası olmalıdır.',
            'image.mimes' => 'Resim alanı jpeg,png,jpg,gif,svg dosya türlerinden biri olmalıdır.',
            'image.max' => 'Resim alanı en fazla 2048 kb olmalıdır.',
            'meta_title.required' => 'Meta başlık alanı zorunludur.',
            'meta_title.string' => 'Meta başlık alanı metin tipinde olmalıdır.',
            'meta_title.max' => 'Meta başlık alanı en fazla 55 karakter olmalıdır.',
            'meta_description.required' => 'Meta açıklama alanı zorunludur.',
            'meta_description.string' => 'Meta açıklama alanı metin tipinde olmalıdır.',
            'meta_description.max' => 'Meta açıklama alanı en fazla 155 karakter olmalıdır.',
            'meta_keywords.required' => 'Meta anahtar kelimeler alanı zorunludur.',
            'meta_keywords.string' => 'Meta anahtar kelimeler alanı metin tipinde olmalıdır.',
            'meta_keywords.max' => 'Meta anahtar kelimeler alanı en fazla 255 karakter olmalıdır.',

        ];
    }
}
