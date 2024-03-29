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
           'name_ua'=> 'required',
            'name_ru'=> 'required',
            'description_ua'=> 'required',
            'description_ru'=> 'required',
            'price'=>'numeric',
            'count'=>'numeric'
        ];
    }

    public function messages()
    {
        return [
            'required'=> 'поле :attribute обязательно для заполнения',
            'numeric' => 'в поле :attribute ввести цифры ',
        ];
    }
}
