<?php

namespace App\Services;

// Import Model Category untuk interaksi dengan database kategori
use App\Models\Category;
// Import Model Product untuk interaksi dengan database produk
use App\Models\Product;
// Import LengthAwarePaginator untuk tipe data return pagination
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
// Import Collection untuk tipe data return list/array
use Illuminate\Database\Eloquent\Collection;
// Import Model dasar Eloquent
use Illuminate\Database\Eloquent\Model;

// Kelas Service untuk menangani logika bisnis terkait Produk
class ProductService
{
    // Mengambil daftar produk dengan pembagian halaman (pagination)
    // @param int $perPage Jumlah item yang ditampilkan per halaman (default: 5)
    // @return LengthAwarePaginator Objek paginator berisi data produk
    public function getPaginatedProducts(int $perPage = 5): LengthAwarePaginator
    {
        // Mengembalikan data produk diurutkan dari yang terbaru dan dipag inasi
        return Product::latest()->paginate($perPage);
    }

    // Mengambil semua data kategori (biasanya untuk keperluan dropdown di form produk)
    // @return Collection Koleksi semua data kategori
    public function getAllCategories(): Collection
    {
        // Mengembalikan semua baris data dari tabel kategori
        return Category::all();
    }

    // Membuat produk baru berdasarkan data dari DTO
    // @param \App\DTOs\Product\CreateProductDTO $dto Data Transfer Object untuk pembuatan produk
    // @return Model Model produk yang baru dibuat
    public function createProduct(\App\DTOs\Product\CreateProductDTO $dto): Model
    {
        // Mengubah objek DTO menjadi format array
        $data = $dto->toArray();
        // Membuat dan menyimpan data produk baru ke database menggunakan array tersebut
        return Product::create($data);
    }

    // Memperbarui data produk yang sudah ada
    // @param Product $product Model produk yang akan diperbarui
    // @param \App\DTOs\Product\UpdateProductDTO $dto Data baru untuk pembaruan
    // @return Product Model produk yang telah diperbarui
    public function updateProduct(Product $product, \App\DTOs\Product\UpdateProductDTO $dto): Product
    {
        // Mengubah objek DTO menjadi format array
        $data = $dto->toArray();
        // Melakukan update data pada instance produk dengan data baru
        $product->update($data);
        
        // Mengembalikan objek produk yang telah diperbarui
        return $product;
    }

    // Menghapus produk dari database
    // @param Product $product Model produk yang akan dihapus
    // @return void Tidak mengembalikan nilai
    public function deleteProduct(Product $product): void
    {
        // Menghapus data produk dari database
        $product->delete();
    }
}
