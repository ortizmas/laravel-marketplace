<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name' => ['required',
                        'min:3',
                        Rule::unique('stores')->ignore($this->store)],
            'description' => 'required|min:10',
            'phone' => 'required',
            'mobil_phone' => 'required',
            'logo' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo :attribute é obrigatorio',
            'min' => 'Campo deve ter mínimo :min carateres',
            'image' => 'O :attribute não é uma imagem valida',
        ];
    }
}
