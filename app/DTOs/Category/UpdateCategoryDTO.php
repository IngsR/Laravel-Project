<?php

namespace App\DTOs\Category;

// Data Transfer Object (DTO) untuk menangani data pembaruan kategori
class UpdateCategoryDTO
{
    // Constructor untuk menginisialisasi properti DTO
    // @param string $name Nama kategori baru (wajib diisi)
    // @param string|null $description Deskripsi kategori baru (opsional, bisa null)
    public function __construct(
        public readonly string $name,
        public readonly ?string $description,
    ) {}

    // Factory method untuk membuat instance DTO dari data request array
    // @param array $data Data input dari request yang telah divalidasi
    // @return self Mengembalikan instance baru dari kelas ini
    public static function fromRequest(array $data): self
    {
        // Mengembalikan instance baru dengan memetakan data array ke properti
        return new self(
            name: $data['name'],
            // Menggunakan operator null coalescing (??) untuk menangani nilai null jika tidak dikirim
            description: $data['description'] ?? null,
        );
    }

    // Mengubah objek DTO menjadi format array untuk update database
    // @return array Array asosiatif berisi data kategori yang akan diupdate
    public function toArray(): array
    {
        // Mengembalikan array dengan key yang sesuai dengan kolom database
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
