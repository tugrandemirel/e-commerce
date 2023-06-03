<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'name' => 'required',
            'surname'  => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'date_of_birth' => 'nullable'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Ad alanı boş bırakılamaz.',
            'surname.required' => 'Soyad alanı boş bırakılamaz.',
            'email.required' => 'E-mail alanı boş bırakılamaz.',
            'email.email' => 'E-mail formatı hatalı.',
            'phone.required' => 'Telefon alanı boş bırakılamaz.',
        ];
    }
}
