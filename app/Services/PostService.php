<?php

namespace App\Services;


// Import Model Post untuk interaksi dengan database
use App\Models\Post;
// Import LengthAwarePaginator untuk tipe data return pagination
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
// Import Model dasar Eloquent
use Illuminate\Database\Eloquent\Model;
// Import Facade Storage untuk operasi file system
use Illuminate\Support\Facades\Storage;

// Kelas Service untuk menangani logika bisnis terkait Postingan
class PostService
{
    // Mengambil daftar postingan dengan pembagian halaman (pagination)
    // @param int $perPage Jumlah item yang ditampilkan per halaman (default: 5)
    // @return LengthAwarePaginator Objek paginator berisi data postingan
    public function getPaginatedPosts(int $perPage = 5): LengthAwarePaginator
    {
        // Mengembalikan data postingan diurutkan dari yang terbaru dan dipag inasi
        return Post::latest()->paginate($perPage);
    }

    // Membuat postingan baru berdasarkan data dari DTO
    // @param \App\DTOs\Post\CreatePostDTO $dto Data Transfer Object untuk pembuatan postingan
    // @return Model Model postingan yang baru dibuat
    public function createPost(\App\DTOs\Post\CreatePostDTO $dto): Model
    {
        // Mengubah DTO menjadi array untuk disimpan
        $data = $dto->toArray();

        // Mengecek apakah ada file gambar yang diunggah
        if ($dto->image) {
            // Menyimpan gambar ke penyimpanan publik di folder 'posts'
            $path = $dto->image->store('posts', 'public');
            // Menambahkan path gambar ke dalam array data
            $data['image'] = $path;
        }

        // Membuat dan menyimpan data postingan baru ke database
        return Post::create($data);
    }

    // Memperbarui postingan yang sudah ada
    // @param Post $post Model postingan yang akan diperbarui
    // @param \App\DTOs\Post\UpdatePostDTO $dto Data baru untuk pembaruan
    // @return Post Model postingan yang telah diperbarui
    public function updatePost(Post $post, \App\DTOs\Post\UpdatePostDTO $dto): Post
    {
        // Mengubah DTO menjadi array data
        $data = $dto->toArray();

        // Mengecek apakah ada gambar baru yang diunggah
        if ($dto->image) {
            // Mengecek apakah postingan sebelumnya memiliki gambar dan filenya ada di storage
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                // Menghapus gambar lama untuk menghemat penyimpanan
                Storage::disk('public')->delete($post->image);
            }
            
            // Menyimpan gambar baru ke penyimpanan publik
            $path = $dto->image->store('posts', 'public');
            // Memperbarui path gambar di data yang akan disimpan
            $data['image'] = $path;
        }

        // Melakukan update data pada instance postingan
        $post->update($data);
        
        // Mengembalikan objek postingan yang telah diperbarui
        return $post;
    }

    // Menghapus postingan dari database
    // @param Post $post Model postingan yang akan dihapus
    // @return void Tidak mengembalikan nilai
    public function deletePost(Post $post): void
    {
        // Mengecek apakah postingan memiliki gambar dan filenya ada di storage
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            // Menghapus file gambar dari penyimpanan publik
            Storage::disk('public')->delete($post->image);
        }
        
        // Menghapus data postingan dari database
        $post->delete();
    }
}
