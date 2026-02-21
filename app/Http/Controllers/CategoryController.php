<?php

namespace App\Http\Controllers;

// Mengimpor Request untuk validasi penyimpanan kategori
use App\Http\Requests\StoreCategoryRequest;
// Mengimpor Request untuk validasi pembaruan kategori
use App\Http\Requests\UpdateCategoryRequest;
// Mengimpor Model Category
use App\Models\Category;
// Mengimpor Service Category untuk logika bisnis
use App\Services\CategoryService;

// Controller untuk menangani request terkait Kategori
class CategoryController extends Controller
{
    // Properti untuk menyimpan instance CategoryService
    protected $categoryService;

    // Constructor untuk dependency injection service
    // @param CategoryService $categoryService
    public function __construct(CategoryService $categoryService)
    {
        // Menyimpan service ke properti
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    // Method untuk menampilkan daftar kategori
    public function index()
    {
        // Mengambil data kategori yang dipaginasi (10 per halaman)
        $categories = $this->categoryService->getPaginatedCategories(10);
        // Mengembalikan view index dengan data categories
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Method untuk menampilkan form tambah kategori
    public function create()
    {
        // Mengembalikan view create
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Method untuk menyimpan kategori baru
    // @param StoreCategoryRequest $request Request yang tervalidasi
    public function store(StoreCategoryRequest $request)
    {
        // Membuat DTO dari request create yang valid
        $dto = \App\DTOs\Category\CreateCategoryDTO::fromRequest($request->validated());
        // Memanggil service untuk menyimpan kategori
        $this->categoryService->createCategory($dto);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('categories.index')
                         ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // Method untuk menampilkan detail kategori
    // @param Category $category
    public function show(Category $category)
    {
        // Mengembalikan view show dengan data category
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Method untuk menampilkan form edit kategori
    // @param Category $category
    public function edit(Category $category)
    {
        // Mengembalikan view edit dengan data category
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Method untuk memperbarui kategori
    // @param UpdateCategoryRequest $request
    // @param Category $category
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Membuat DTO update dari request valid
        $dto = \App\DTOs\Category\UpdateCategoryDTO::fromRequest($request->validated());
        // Memanggil service untuk update kategori
        $this->categoryService->updateCategory($category, $dto);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Method untuk menghapus kategori
    // @param Category $category
    public function destroy(Category $category)
    {
        try {
            // Mencoba melakukan penghapusan via service
            $this->categoryService->deleteCategory($category);
            // Redirect sukses jika berhasil
            return redirect()->route('categories.index')
                             ->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika gagal (misal karena constraint DB)
            return redirect()->route('categories.index')
                             ->with('error', $e->getMessage());
        }
    }
}
