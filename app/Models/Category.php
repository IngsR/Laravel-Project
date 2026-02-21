<?php

namespace App\Models;

// Mengimpor trait HasFactory untuk mendukung pembuatan dummy data
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Mengimpor kelas Model dasar Eloquent
use Illuminate\Database\Eloquent\Model;

// Kelas Model yang merepresentasikan tabel 'categories' di database
class Category extends Model
{
    // Menggunakan trait HasFactory untuk factory model
    use HasFactory;

    // Properti yang menentukan kolom mana saja yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'name',        // Nama kategori
        'description', // Deskripsi kategori
    ];

    // Mendefinisikan relasi 'one-to-many' ke model Product
    // @return \Illuminate\Database\Eloquent\Relations\HasMany
    public function products()
    {
        // Satu kategori bisa memiliki banyak produk
        return $this->hasMany(Product::class);
    }
}
