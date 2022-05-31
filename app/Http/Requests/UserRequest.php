<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required' ,'min:7' ,'max:255' ],
            'email' => ['required','min:7','max:255','email',Rule::unique('users','email')],
            'image' => ['required','min:4','max:255','image'],
            'password' => ['required','min:7','max:255','required_with:ConfirmPassword','same:ConfirmPassword'],
            'ConfirmPassword' => ['required','min:7','max:255',],
        ];
    }
}
