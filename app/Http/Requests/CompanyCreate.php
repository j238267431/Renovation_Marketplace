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
      'phone'         => 'required|min:11',
      'email'         => 'required|email',
      'cover'         => 'sometimes|file|mimetypes:image/bmp,image/png,image/jpeg|max:1024|dimensions:width=150,height=150',
      'address'       => 'required|string|min:10',
      'description'   => 'required|string|min:10',
    ];
  }
  public function messages()
  {
    return [
      'required'              => 'Поле :attribute обязательно для заполнения',
      'min'                   => 'Поле :attribute должно быть не меньше :min символов',
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
