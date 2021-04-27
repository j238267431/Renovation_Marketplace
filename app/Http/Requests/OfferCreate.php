<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferCreate extends FormRequest
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
            'name'          => 'required|min:5',
            'description'   => 'required|string|min:10',
            'price'         => 'required|numeric|min:2',
            'category_id'   => 'required|numeric|min:1',
            'company_id'   => 'required|numeric|min:1',
        ];
    }
    public function messages()
    {
        return [
            'required'              => 'Поле :attribute обязательно для заполнения',
            'min'                   => 'Поле :attribute должно быть не меньше :min символов',
            'company_id.required'   => 'Необходимо выбрать одну из компаний',
            'category_id.required'  => 'Необходимо выбрать Категорию',
        ];
    }
    public function attributes()
    {
        return [
            'name'          => 'название предложния',
            'description'   => 'описание',
            'price'         => 'стоимость',
        ];
    }
}
