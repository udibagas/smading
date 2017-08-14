<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'kode_registrasi' => 'required',
            'skpd' => 'required',
            'pemilik' => 'required',
            'gedung_id' => 'required',
            'ruang_id' => 'required',
            'posisi' => 'required',
            'koneksi_listrik' => 'required',
            'ip_address' => 'required',
            'koneksi_lan' => 'required',
            'merk' => 'required',
            'model' => 'required',
            'serial_number' => 'required',
            'tanggal_penempatan' => 'required|date',
            'tanggal_ikatan_pengadaan' => 'required|date',
            'tanggal_berakhir_garansi' => 'required|date',
            'tanggal_berakhir_sewa' => 'required|date',
            'nomor_ikatan_pengadaan' => 'required',
            'harga_pengadaan' => 'required',
            'nama_kontak' => 'required',
            'nomor_kontak' => 'required',
            'fungsi' => 'required',
            'status_kepemilikan' => 'required',
            'kondisi' => 'required',
            'negara_pembuat' => 'required',
            'keterangan' => 'required',
        ];
    }
}
