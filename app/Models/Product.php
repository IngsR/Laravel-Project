<?php

namespace App\Models;

// Mengimpor trait HasFactory untuk mendukung factory
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Mengimpor kelas Model dasar Eloquent
use Illuminate\Database\Eloquent\Model;

// Kelas Model yang merepresentasikan tabel 'products' di database
class Product extends Model
{
    // Menggunakan trait HasFactory
    use HasFactory;

    // Properti yang menentukan kolom mana saja yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'name',        // Nama produk
        'sku',         // Stock Keeping Unit / Kode unik produk
        'description', // Deskripsi produk
        'price',       // Harga produk
        'quantity',    // Jumlah stok produk
        'category_id', // Foreign key ke tabel categories
    ];

    // Mendefinisikan relasi 'belongs-to' ke model Category
    // @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    public function category()
    {
        // Setiap produk dimiliki oleh satu kategori
        return $this->belongsTo(Category::class);
    }
}
