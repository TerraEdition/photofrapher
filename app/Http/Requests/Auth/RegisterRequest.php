<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'nama' => 'required|max:50',
            'username' => 'required|unique:users,username|max:50',
            'password' => [
                'required', Password::min(5)
                    // ->mixedCase()
                    ->letters()
                    ->numbers()
                // ->symbols()
                // ->uncompromised()
            ],
            'email' => 'required|email',
            'no_hp' => 'required|regex:/(^08[1-9][0-9]{6,10}$)/u',
        ];
    }

    public function attributes()
    {
        return [
            'no_hp' => "No HP"
        ];
    }
    public function messages()
    {
        return [
            'no_hp.regex' => "Kombinasi No HP Tidak Valid",
        ];
    }
}
