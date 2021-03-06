<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PintuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'description' => 'required',
            'lantai' => 'required',
            'ruang_id' => 'required',
            'gedung_id' => 'required',
            'ip_address' => 'required',
            'username' => 'required',
            'password' => 'required',
        ];
    }
}
