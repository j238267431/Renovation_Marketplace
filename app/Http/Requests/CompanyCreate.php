<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreate extends FormRequest
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
      'name'          => 'required|min:2',
      'phone'         => 'required|min:5',
      'email'         => 'required|email:rfc,dns',
      'cover'         => 'sometimes|file',
      'address'       => 'required|min:10',
      'description'   => 'required|min:10', 
    ];
  }
  public function messages()
  {
    return [
      'required'              => 'Поле :attribute обязательно для заполнения',
      'min'                   => 'Поле :attribute должно быть не меньше :min букв.',
      'category_id.required'  => 'Необходимо выбрать Категорию'
    ];
  }
  public function attributes()
  {
    return [
      'name'          => 'Название',
      'phone'         => 'Телефон',
      'email'         => 'Email',
      'cover'         => 'Логотип', 
      'address'       => 'Адрес',
      'description'   => 'Описание',
    ];
  }
}
