<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formComments extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Внимание !!!! не забыть выставить в true иначе не пропустит!!!
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            "commentBody" => [ 'string' , 'required' , 'min:3'],
            "commentSubject"  => [ 'string' , 'required' , 'min:3'],

        ];
    }

    public function messages()
    {
        return [
            //

            "commentSubject.string"  => 'Поле должно быть строка',
            "commentSubject.required"  => 'Поле должно не пустым',
            "commentSubject.min"  => 'Поле должно 3 символа',

        ];
    }


}
