<?php

namespace App\DTOs\Product;

// Data Transfer Object (DTO) untuk menangani data pembaruan produk
class UpdateProductDTO
{
    // Constructor untuk menginisialisasi properti DTO
    // @param string $name Nama produk (wajib diisi)
    // @param string $sku Model/Kode produk (wajib diisi dan unik)
    // @param string|null $description Deskripsi produk (opsional)
    // @param float $price Harga produk
    // @param int $quantity Jumlah stok
    // @param int $category_id ID Kategori (wajib diisi)
    public function __construct(
        public readonly string $name,
        public readonly string $sku,
        public readonly ?string $description,
        public readonly float $price,
        public readonly int $quantity,
        public readonly int $category_id,
    ) {}

    // Factory method untuk membuat instance DTO dari data request array
    // @param array $data Data input dari request yang valid
    // @return self Mengembalikan instance baru dari kelas ini
    public static function fromRequest(array $data): self
    {
        // Mengembalikan instance baru dengan casting tipe data
        return new self(
            name: $data['name'],
            sku: $data['sku'],
            description: $data['description'] ?? null,
            price: (float) $data['price'],
            quantity: (int) $data['quantity'],
            category_id: (int) $data['category_id'],
        );
    }

    // Mengubah objek DTO menjadi format array
    // @return array Array asosiatif berisi data produk untuk diupdate
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
