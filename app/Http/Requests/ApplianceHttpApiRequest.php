<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplianceHttpApiRequest extends FormRequest
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
            'appliance_id' => 'required',
            'url' => 'required',
            'description' => 'required',
            'unit' => 'required',
            'data_type' => 'required',
            'monitoring_parameter_id' => 'required',
        ];
    }
}
