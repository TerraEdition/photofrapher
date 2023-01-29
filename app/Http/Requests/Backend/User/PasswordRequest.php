<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordRequest extends FormRequest
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
            'password_lama' => 'required',
            'password_baru' => [
                'required', Password::min(5)
                    ->letters()
                    ->numbers(), 'same:konfirmasi_password'
            ],
            'konfirmasi_password' => [
                'required', Password::min(5)
                    ->letters()
                    ->numbers(), 'same:password_baru'
            ],
        ];
    }
    public function attributes()
    {
        return [
            'password_lama' => "Password Lama",
            'password_baru' => "Password Baru",
            'konfirmasi_password' => 'Konfirmasi Password',
        ];
    }
}
