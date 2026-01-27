<?php

namespace App\DTOs\Post;

use Illuminate\Http\UploadedFile;

// Data Transfer Object (DTO) untuk menangani data pembaruan postingan
class UpdatePostDTO
{
    // Constructor untuk menginisialisasi properti DTO
    // @param string $title Judul postingan yang diperbarui (wajib diisi)
    // @param string $content Isi/konten postingan yang diperbarui (wajib diisi)
    // @param UploadedFile|null $image File gambar baru (opsional, bisa null)
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly ?UploadedFile $image,
    ) {}

    // Factory method untuk membuat instance DTO dari data request array
    // @param array $data Data input dari request yang telah divalidasi
    // @param UploadedFile|null $image File gambar baru jika ada (opsional)
    // @return self Mengembalikan instance baru dari kelas ini
    public static function fromRequest(array $data, ?UploadedFile $image = null): self
    {
        // Mengembalikan instance baru dengan memetakan data ke properti
        return new self(
            title: $data['title'],
            content: $data['content'],
            image: $image,
        );
    }

    // Mengubah objek DTO menjadi format array
    // @return array Array asosiatif berisi data postingan yang akan diupdate
    public function toArray(): array
    {
        // Mengembalikan data utama postingan dalam bentuk array
        return [
            'title' => $this->title,
            'content' => $this->content,
            // Path gambar akan ditambahkan oleh service jika ada gambar baru
        ];
    }
}
