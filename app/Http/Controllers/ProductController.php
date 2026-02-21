<?php

namespace App\Http\Controllers;

// Mengimpor Request untuk validasi penyimpanan produk
use App\Http\Requests\StoreProductRequest;
// Mengimpor Request untuk validasi pembaruan produk
use App\Http\Requests\UpdateProductRequest;
// Mengimpor Model Product
use App\Models\Product;
// Mengimpor Service Product untuk logika bisnis
use App\Services\ProductService;

// Controller untuk menangani interaksi pengguna terkait Produk
class ProductController extends Controller
{
    // Properti untuk menyimpan instance ProductService
    protected $productService;

    // Constructor untuk menerapkan dependency injection
    // @param ProductService $productService Instance service produk
    public function __construct(ProductService $productService)
    {
        // Menyimpan service yang di-inject ke properti class
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    // Method untuk menampilkan daftar produk
    // Mengembalikan view index dengan data produk yang dipaginasi
    public function index()
    {
        // Mengambil daftar produk dari service, 5 item per halaman
        $products = $this->productService->getPaginatedProducts(5);
        // Mengembalikan view 'products.index' dan mengirimkan variabel $products
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Method untuk menampilkan form pembuatan produk baru
    public function create()
    {
        // Mengambil semua data kategori dari service untuk dropdown pilihan kategori
        $categories = $this->productService->getAllCategories();
        // Mengembalikan view 'products.create' dan mengirimkan variabel $categories
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Method untuk menyimpan data produk baru ke database
    // @param StoreProductRequest $request Objek request yang sudah divalidasi
    public function store(StoreProductRequest $request)
    {
        // Membuat DTO (Data Transfer Object) dari data request yang sudah divalidasi
        $dto = \App\DTOs\Product\CreateProductDTO::fromRequest($request->validated());
        // Memanggil fungsi createProduct pada service dengan parameter DTO
        $this->productService->createProduct($dto);

        // Mengarahkan pengguna kembali ke route 'products.index'
        return redirect()->route('products.index')
                         // Mengirimkan pesan sukses sementara (flash message)
                         ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // Method untuk menampilkan detail data satu produk
    // @param Product $product Model produk yang akan ditampilkan (Route Model Binding)
    public function show(Product $product)
    {
        // Mengembalikan view 'products.show' dan mengirimkan variabel $product
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Method untuk menampilkan form edit produk
    // @param Product $product Model produk yang akan diedit
    public function edit(Product $product)
    {
        // Mengambil semua data kategori untuk dropdown pilihan kategori pada form edit
        $categories = $this->productService->getAllCategories();
        // Mengembalikan view 'products.edit' dengan data produk dan kategori
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Method untuk memperbarui data produk di database
    // @param UpdateProductRequest $request Request validasi update
    // @param Product $product Model produk yang akan diupdate
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Membuat DTO update dari data request yang telah divalidasi
        $dto = \App\DTOs\Product\UpdateProductDTO::fromRequest($request->validated());
        // Memanggil fungsi updateProduct pada service untuk memproses pembaruan data
        $this->productService->updateProduct($product, $dto);

        // Mengarahkan pengguna kembali ke halaman index produk
        return redirect()->route('products.index')
                         // Mengirimkan pesan sukses
                         ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Method untuk menghapus data produk dari database
    // @param Product $product Model produk yang akan dihapus
    public function destroy(Product $product)
    {
        // Memanggil fungsi deleteProduct pada service untuk menghapus data
        $this->productService->deleteProduct($product);

        // Mengarahkan pengguna kembali ke halaman index
        return redirect()->route('products.index')
                         // Mengirimkan pesan sukses
                         ->with('success', 'Product deleted successfully.');
    }
}
