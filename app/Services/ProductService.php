<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getPaginatedProducts(int $perPage = 5)
    {
        return Product::latest()->paginate($perPage);
    }

    public function getAllCategories()
    {
        return \App\Models\Category::all();
    }

    public function createProduct(\App\DTOs\Product\CreateProductDTO $dto)
    {
        return Product::create($dto->toArray());
    }

    public function updateProduct(Product $product, \App\DTOs\Product\UpdateProductDTO $dto)
    {
        $product->update($dto->toArray());
        return $product;
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
    }
}
