<?php

namespace App\DTOs\Product;

// Data Transfer Object (DTO) untuk menangani data pembuatan produk
class CreateProductDTO
{
    // Constructor untuk menginisialisasi properti DTO
    // @param string $name Nama produk (wajib diisi)
    // @param string $sku Stock Keeping Unit / kode unik produk (wajib diisi)
    // @param string|null $description Deskripsi produk (opsional, bisa null)
    // @param float $price Harga produk
    // @param int $quantity Jumlah stok produk
    // @param int $category_id ID kategori produk
    public function __construct(
        public readonly string $name,
        public readonly string $sku,
        public readonly ?string $description,
        public readonly float $price,
        public readonly int $quantity,
        public readonly int $category_id,
    ) {}

    // Factory method untuk membuat instance DTO dari data request array
    // @param array $data Data input dari request (biasanya $request->validated())
    // @return self Mengembalikan instance baru dari kelas ini
    public static function fromRequest(array $data): self
    {
        // Mengembalikan instance baru dengan memetakan data array ke properti
        return new self(
            name: $data['name'],
            sku: $data['sku'],
            // Menggunakan operator null coalescing (??) jika key 'description' tidak ada
            description: $data['description'] ?? null,
            // Melakukan casting tipe data untuk memastikan format yang benar
            price: (float) $data['price'],
            quantity: (int) $data['quantity'],
            category_id: (int) $data['category_id'],
        );
    }

    // Mengubah objek DTO menjadi format array
    // @return array Array asosiatif berisi data produk untuk disimpan ke database
    public function toArray(): array
    {
        // Mengembalikan array dengan key yang sesuai dengan kolom database
        return [
            'name' => $this->name,
            'sku' => $this->sku,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'category_id' => $this->category_id,
        ];
    }
}
