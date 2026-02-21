<?php

namespace App\Http\Requests;

// Mengimpor kelas FormRequest utama Laravel
use Illuminate\Foundation\Http\FormRequest;

// Request validation untuk pembaruan data Produk
class UpdateProductRequest extends FormRequest
{
    // Menentukan hak akses user untuk request ini
    // @return bool
    public function authorize(): bool
    {
        // Mengizinkan semua user yang mengakses
        return true;
    }

    // Mendefinisikan aturan validasi
    // @return array
    public function rules(): array
    {
        // Mengembalikan array aturan validasi
        return [
            'name' => 'required|string|max:255', // Nama wajib, string, max 255
            // SKU unik, tapi mengecualikan ID produk yang sedang diedit agar tidak dianggap duplikat diri sendiri
            'sku' => 'required|string|max:255|unique:products,sku,' . $this->route('product')->id,
            'description' => 'nullable|string', // Deskripsi boleh kosong
            'price' => 'required|numeric|min:0', // Harga wajib angka positif
            'quantity' => 'required|integer|min:0', // Jumlah stok wajib integer positif
            'category_id' => 'required|exists:categories,id', // ID kategori harus ada di database
        ];
    }
}
