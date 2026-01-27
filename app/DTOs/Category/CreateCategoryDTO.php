<?php

namespace App\DTOs\Category;

// Data Transfer Object (DTO) untuk menangani data pembuatan kategori
class CreateCategoryDTO
{
    // Constructor untuk menginisialisasi properti DTO
    // @param string $name Nama kategori (wajib diisi)
    // @param string|null $description Deskripsi kategori (opsional, bisa null)
    public function __construct(
        public readonly string $name,
        public readonly ?string $description,
    ) {}

    // Factory method untuk membuat instance DTO dari data request array
    // @param array $data Data input dari request (biasanya $request->validated())
    // @return self Mengembalikan instance baru dari kelas ini
    public static function fromRequest(array $data): self
    {
        // Mengembalikan instance baru dengan memetakan data array ke properti
        return new self(
            name: $data['name'],
            // Menggunakan operator null coalescing (??) jika key 'description' tidak ada
            description: $data['description'] ?? null,
        );
    }

    // Mengubah objek DTO menjadi format array
    // @return array Array asosiatif berisi data kategori
    public function toArray(): array
    {
        // Mengembalikan array dengan key yang sesuai dengan kolom database
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
