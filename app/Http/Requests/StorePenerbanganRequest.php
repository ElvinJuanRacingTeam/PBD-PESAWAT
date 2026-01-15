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
            'kota_asal' => 'required|string',
            'kota_tujuan' => 'required|string',
            'tgl_keberangkatan' => 'required|date',
            'waktu_keberangkatan' => 'required',
            'waktu_tiba' => 'required',
            'gerbang' => 'required|string',
            'kelas' => 'required|in:Economy,Business,First Class',
            'maskapai' => 'required|string',
        ];
    }
}
