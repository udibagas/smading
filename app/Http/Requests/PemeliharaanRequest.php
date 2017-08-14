<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemeliharaanRequest extends FormRequest
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
            'inventory_id' => 'required',
            'biaya' => 'required',
            'pajak_biaya' => 'required',
            'jenis' => 'required',
            'ikatan_perjanjian' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tanggal_selanjutnya' => 'required|date',
            'tanggal_berakhir_garansi' => 'required|date',
            'kondisi_setelah' => 'required',
            'catatan' => 'required',
        ];
    }
}
