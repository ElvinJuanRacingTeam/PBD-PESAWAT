<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemesananRequest extends FormRequest
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
            'penumpang_id' => 'required|exists:penumpangs,id',
            'penerbangan_id' => 'required|exists:penerbangans,id',
            'nomor_kursi' => 'required|string',
            'total_harga' => 'required|integer',
            'tgl_pemesanan' => 'required|date',
            'metode_pembayaran' => 'required|in:Transfer,Cash,E-Wallet',
        ];
    }
}
