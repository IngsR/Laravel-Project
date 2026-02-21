<?php

namespace App\Http\Requests;

// Mengimpor kelas FormRequest utama Laravel
use Illuminate\Foundation\Http\FormRequest;

// Request validation untuk penyimpanan data Produk baru
class StoreProductRequest extends FormRequest
{
    // Menentukan apakah user diizinkan untuk membuat request ini
    // @return bool
    public function authorize(): bool
    {
        // Mengembalikan true, artinya semua user (yang sudah login jika ada middleware) boleh akses
        return true;
    }

    // Mendefinisikan aturan validasi untuk setiap input
    // @return array
    public function rules(): array
    {
        // Mengembalikan array aturan validasi
        return [
            'name' => 'required|string|max:255', // Nama wajib diisi, string, max 255 char
            'sku' => 'required|string|unique:products,sku|max:255', // SKU wajib, unik di tabel products
            'description' => 'nullable|string', // Deskripsi opsional, jika ada harus string
            'price' => 'required|numeric|min:0', // Harga wajib, angka, tidak boleh negatif
            'quantity' => 'required|integer|min:0', // Stok wajib, bilangan bulat, tidak boleh negatif
            'category_id' => 'required|exists:categories,id', // Kategori wajib dan ID harus ada di tabel categories
        ];
    }
}
