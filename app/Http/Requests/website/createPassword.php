<?php

namespace App\Http\Requests\website;

use Illuminate\Foundation\Http\FormRequest;

class createPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|numeric|exists:users,username',
            'code' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

}
