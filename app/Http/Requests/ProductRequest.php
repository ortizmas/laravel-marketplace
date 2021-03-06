<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //'name' => 'required|min:3|unique:stores,name,' . $this->store->id,
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'body' => 'required|min:10',
            'price' => 'required',
            'photos.*' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo :attribute é obrigatorio',
            'min' => 'Campo deve ter mínimo :min carateres',
            'image' => 'A :attribute não e valido',
        ];
    }
}
