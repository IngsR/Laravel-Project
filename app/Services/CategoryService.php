<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function deleteCategory(Category $category)
    {
        if ($category->products()->count() > 0) {
            throw new \Exception('Cannot delete category because it has associated products.');
        }

        $category->delete();
    }
}
