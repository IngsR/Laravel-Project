<?php

namespace App\Models;

// Mengimpor trait HasFactory untuk mendukung factory
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Mengimpor kelas Model dasar Eloquent
use Illuminate\Database\Eloquent\Model;

// Kelas Model yang merepresentasikan tabel 'posts' di database
class Post extends Model
{
    // Menggunakan trait HasFactory
    use HasFactory;
    
    // Properti yang menentukan kolom mana saja yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'title',   // Judul postingan
        'content', // Konten postingan
        'image'    // Path gambar postingan
    ];
}
