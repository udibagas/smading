<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonitoringRequest extends FormRequest
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
            'gedung_id' => 'required',
            'ruang_id' => 'required',
            'monitoring_parameter_id' => 'required',
            'min_value' => 'required',
            'max_value' => 'required',
            'hi_value' => 'required',
            'lo_value' => 'required',
        ];
    }
}
