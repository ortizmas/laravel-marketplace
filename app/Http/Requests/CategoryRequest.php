<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                        Rule::unique('categories')->ignore($this->category)],
            
        ];

        /*switch ($this->getMethod()) {
            case 'POST':
                return [
                    'name' => 'required|min:3|unique:categories,name',
                    'slug' => 'required|min:3'
                ];
                break;
            
            case 'PUT':
                return [
                    'name' => 'required|min:3|unique:categories,name,' . $this->category->id . ',id',
                    'slug' => 'required|min:3'
                ];
                break;
        }*/
        
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'slug' => 'Slug',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo :attribute é obrigatorio',
            'unique' => 'O :attribute já existe em nosso registro',
            'min' => 'Campo deve ter mínimo :min carateres'
        ];
    }
}
