<?php

namespace App\DTOs\Product;

class UpdateProductDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $sku,
        public readonly ?string $description,
        public readonly float $price,
        public readonly int $quantity,
        public readonly int $category_id,
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'],
            sku: $data['sku'],
            description: $data['description'] ?? null,
            price: (float) $data['price'],
            quantity: (int) $data['quantity'],
            category_id: (int) $data['category_id'],
        );
    }

    public function toArray(): array
    {
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
