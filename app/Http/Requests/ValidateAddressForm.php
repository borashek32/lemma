<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAddressForm extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'address'        =>    'required',
            'phone'          =>    'required',
            'user_id'        =>    'required'
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Поле "Адрес" обязательно для заполнения',
            'phone.required' => 'Поле "Адрес" обязательно для заполнения',
        ];
    }
}
