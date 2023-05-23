<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class SProductStoreRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'short_description' => 'required|string|max:150',
            'category_id' => 'required|integer|exists:categories,id',
            'sub_category_id' => 'nullable|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'stock' => 'required|integer|in:0,1',
            'visibility' => 'required|integer|in:0,1',
            'push_on' => 'required|integer|in:0,1',
            'status' => 'required|integer|in:0,1,2',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'meta_title' => 'nullable|string|max:100',
            'meta_description' => 'nullable|string|max:150',
            'meta_keywords' => 'nullable|string|max:150',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Başlık alanı zorunludur.',
            'title.string' => 'Başlık alanı metin tipinde olmalıdır.',
            'title.max' => 'Başlık alanı en fazla 100 karakter olmalıdır.',
            'description.required' => 'Açıklama alanı zorunludur.',
            'description.string' => 'Açıklama alanı metin tipinde olmalıdır.',
            'description.max' => 'Açıklama alanı en fazla 150 karakter olmalıdır.',
            'short_description.required' => 'Kısa açıklama alanı zorunludur.',
            'short_description.string' => 'Kısa açıklama alanı metin tipinde olmalıdır.',
            'short_description.max' => 'Kısa açıklama alanı en fazla 150 karakter olmalıdır.',
            'category_id.required' => 'Kategori alanı zorunludur.',
            'category_id.integer' => 'Kategori alanı sayı tipinde olmalıdır.',
            'category_id.exists' => 'Kategori alanı sistemde kayıtlı olmalıdır.',
            'sub_category_id.integer' => 'Alt kategori alanı sayı tipinde olmalıdır.',
            'sub_category_id.exists' => 'Alt kategori alanı sistemde kayıtlı olmalıdır.',
            'brand_id.required' => 'Marka alanı zorunludur.',
            'brand_id.integer' => 'Marka alanı sayı tipinde olmalıdır.',
            'brand_id.exists' => 'Marka alanı sistemde kayıtlı olmalıdır.',
            'stock.required' => 'Stok alanı zorunludur.',
            'stock.integer' => 'Stok alanı sayı tipinde olmalıdır.',
            'stock.in' => 'Stok alanı 1 veya 2 olabilir.',
            'visibility.required' => 'Görünürlük alanı zorunludur.',
            'visibility.integer' => 'Görünürlük alanı sayı tipinde olmalıdır.',
            'visibility.in' => 'Görünürlük alanı 1 veya 2 olabilir.',
            'push_on.required' => 'Anasayfada göster alanı zorunludur.',
            'push_on.integer' => 'Anasayfada göster alanı sayı tipinde olmalıdır.',
            'status.required' => 'Ürün Durumu  alanı zorunludur.',
            'status.integer' => 'Ürün Durumu  alanı sayı tipinde olmalıdır.',
            'push_on.in' => 'Anasayfada göster alanı 1 veya 2 olabilir.',
            'price.required' => 'Fiyat alanı zorunludur.',
            'price.numeric' => 'Fiyat alanı sayı tipinde olmalıdır.',
            'start_date.required' => 'Başlangıç tarihi alanı zorunludur.',
            'start_date.date' => 'Başlangıç tarihi alanı tarih tipinde olmalıdır.',
            'end_date.required' => 'Bitiş tarihi alanı zorunludur.',
            'end_date.date' => 'Bitiş tarihi alanı tarih tipinde olmalıdır.',
            'end_date.after' => 'Bitiş tarihi alanı başlangıç tarihinden sonra olmalıdır.',
            'meta_title.string' => 'Meta başlık alanı metin tipinde olmalıdır.',
            'meta_title.max' => 'Meta başlık alanı en fazla 100 karakter olmalıdır.',
            'meta_description.string' => 'Meta açıklama alanı metin tipinde olmalıdır.',
            'meta_description.max' => 'Meta açıklama alanı en fazla 150 karakter olmalıdır.',
            'meta_keywords.string' => 'Meta anahtar kelime alanı metin tipinde olmalıdır.',
            'meta_keywords.max' => 'Meta anahtar kelime alanı en fazla 150 karakter olmalıdır.',
        ];
    }
}
