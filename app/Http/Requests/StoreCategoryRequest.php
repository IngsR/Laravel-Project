<?php

namespace App\Http\Requests;

// Mengimpor form request Laravel
use Illuminate\Foundation\Http\FormRequest;

// Kelas validation untuk penyimpanan Kategori
class StoreCategoryRequest extends FormRequest
{
    // Otorisasi user
    // @return bool
    public function authorize(): bool
    {
        // Izinkan semua akses
        return true;
    }

    // Aturan validasi
    // @return array
    public function rules(): array
    {
        // Return array validasi
        return [
            'name' => 'required|string|max:255|unique:categories,name', // Nama harus unik di tabel categories
            'description' => 'nullable|string', // Deskripsi opsional
        ];
    }
}
