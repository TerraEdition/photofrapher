<?php

namespace App\Http\Requests\Backend\Package;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'paket' => 'required|max:100|unique:packages.package',
            'harga' => 'required|numeric|min:1000'
        ];
    }
    public function attributes()
    {
        return [
            'paket'   => 'Nama Paket',
            'harga'   => 'Harga Paket',
        ];
    }
}
