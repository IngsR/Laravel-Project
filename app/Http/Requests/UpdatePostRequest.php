<?php

namespace App\Http\Requests;

// Mengimpor kelas request Laravel
use Illuminate\Foundation\Http\FormRequest;

// Kelas validation untuk update Post
class UpdatePostRequest extends FormRequest
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
        // Return array aturan
        return [
            'title' => 'required', // Judul wajib
            'content' => 'required', // Konten wajib
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Gambar opsional dengan validasi tipe dan ukuran
        ];
    }
}
