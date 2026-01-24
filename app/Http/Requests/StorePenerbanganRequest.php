<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenerbanganRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'tgl_keberangkatan' => 'required|date',
            'waktu_keberangkatan' => 'required',
            'waktu_tiba' => 'required',
            'gerbang' => 'required',
            'kelas' => 'required',
            'maskapai' => 'required',

            'harga_economy' => 'required|integer',
            'harga_business' => 'required|integer',
            'harga_first' => 'required|integer',
        ];
    }
}
