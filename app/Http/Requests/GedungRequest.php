<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GedungRequest extends FormRequest
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
            'jumlah_lantai' => 'required',
        ];
    }
}
