<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            //
            'name' => ['sometimes','required', 'string', 'max:255', 'min:3'],
            'email' => 'sometimes | required | string | email', 'max:255 | unique::users,email,'. ($this->id ? $this->id : ''),
            'old_password' => ['sometimes','required', 'string', 'min:8'],
            'password' => ['sometimes','required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
