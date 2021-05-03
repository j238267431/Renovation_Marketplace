<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalCreate extends FormRequest
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
            'company_id'          => 'required',

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
            'company_id'          => 'компания',
        ];
    }
}
