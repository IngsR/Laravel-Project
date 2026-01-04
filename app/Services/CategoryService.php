<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getPaginatedCategories(int $perPage = 10)
    {
        return Category::latest()->paginate($perPage);
    }

    public function createCategory(\App\DTOs\Category\CreateCategoryDTO $dto)
    {
        return Category::create($dto->toArray());
    }

    public function updateCategory(Category $category, \App\DTOs\Category\UpdateCategoryDTO $dto)
    {
        $category->update($dto->toArray());
        return $category;
    }

    public function deleteCategory(Category $category)
    {
        if ($category->products()->count() > 0) {
            throw new \Exception('Cannot delete category because it has associated products.');
        }

        $category->delete();
    }
}
