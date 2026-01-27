<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Exception;

// Kelas Service untuk menangani logika bisnis terkait Kategori
class CategoryService
{
    // Mengambil daftar kategori dengan pembagian halaman (pagination)
    // @param int $perPage Jumlah item yang ditampilkan per halaman (default: 10)
    // @return LengthAwarePaginator Objek paginator berisi data kategori
    public function getPaginatedCategories(int $perPage = 10): LengthAwarePaginator
    {
        // Mengembalikan data kategori diurutkan dari yang terbaru dan dipag inasi
        return Category::latest()->paginate($perPage);
    }

    // Membuat kategori baru berdasarkan data dari DTO
    // @param \App\DTOs\Category\CreateCategoryDTO $dto Data Transfer Object untuk pembuatan kategori
    // @return Model Model kategori yang baru dibuat
    public function createCategory(\App\DTOs\Category\CreateCategoryDTO $dto): Model
    {
        // Membuat dan menyimpan data kategori baru ke database menggunakan array dari DTO
        return Category::create($dto->toArray());
    }

    // Memperbarui data kategori yang sudah ada
    // @param Category $category Model kategori yang akan diperbarui
    // @param \App\DTOs\Category\UpdateCategoryDTO $dto Data baru untuk pembaruan
    // @return Category Model kategori yang telah diperbarui
    public function updateCategory(Category $category, \App\DTOs\Category\UpdateCategoryDTO $dto): Category
    {
        // Melakukan update data pada instance kategori dengan data dari DTO
        $category->update($dto->toArray());
        
        // Mengembalikan objek kategori yang telah diperbarui
        return $category;
    }

    // Menghapus kategori dari database
    // @param Category $category Model kategori yang akan dihapus
    // @return void Tidak mengembalikan nilai
    // @throws Exception Jika kategori masih memiliki produk terkait
    public function deleteCategory(Category $category): void
    {
        // Memeriksa apakah kategori memiliki relasi produk (menggunakan exists() agar lebih efisien daripada count())
        if ($category->products()->exists()) {
            // Melempar error untuk mencegah penghapusan jika masih ada data produk terkait
            throw new Exception('Cannot delete category because it has associated products.');
        }

        // Menghapus data kategori dari database secara permanen (atau soft delete jika diaktifkan di model)
        $category->delete();
    }
}
