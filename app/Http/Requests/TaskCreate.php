<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class TaskCreate extends FormRequest
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
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'file'          => 'sometimes|file',
            'budget'        => 'sometimes|numeric|nullable',
            'category_id'   => [
                'sometimes',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (!(
                        (Category::where("id", $value)->count() > 0)
                        && (Category::find($value)->parent_id !== null))) {
                        $fail('Выбранное значение для ' . $attribute . ' некорректно.');
                    }
                }
            ]
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
            'title'         => 'Заголовок',
            'description'   => 'Описание',
            'file'          => 'Файл',
            'budget'        => 'Бюджет',
            'category_id'   => 'Категория'
        ];
    }
}
