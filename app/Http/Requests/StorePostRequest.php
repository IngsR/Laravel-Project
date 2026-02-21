<?php

namespace App\Http\Requests;

// Mengimpor kelas request Laravel
use Illuminate\Foundation\Http\FormRequest;

// Kelas validation untuk penyimpanan Post baru
class StorePostRequest extends FormRequest
{
    // Otorisasi user
    // @return bool
    public function authorize(): bool
    {
        // Izinkan semua akses
        return true;
    }

    // Aturan validasi input
    // @return array
    public function rules(): array
    {
        // Return array aturan
        return [
            'title' => 'required', // Judul wajib diisi
            'content' => 'required', // Konten wajib diisi
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Gambar opsional, harus file image, tipe tertentu, max 2MB
        ];
    }
}
