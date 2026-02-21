<?php

namespace App\Http\Requests;

// Mengimpor form request Laravel
use Illuminate\Foundation\Http\FormRequest;

// Kelas validation untuk pembaruan Kategori
class UpdateCategoryRequest extends FormRequest
{
    // Otorisasi user akses
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
            // Nama unik, kecuali untuk kategori yang sedang diedit (ignore current ID)
            'name' => 'required|string|max:255|unique:categories,name,' . $this->route('category')->id,
            'description' => 'nullable|string', // Deskripsi opsional
        ];
    }
}
