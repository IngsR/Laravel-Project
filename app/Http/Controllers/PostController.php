<?php

namespace App\Http\Controllers;

// Mengimpor Request yang digunakan untuk validasi penyimpanan Post
use App\Http\Requests\StorePostRequest;
// Mengimpor Request yang digunakan untuk validasi pembaruan Post
use App\Http\Requests\UpdatePostRequest;
// Mengimpor Model Post untuk berinteraksi dengan tabel posts
use App\Models\Post;
// Mengimpor Service Post untuk menangani logika bisnis
use App\Services\PostService;

// Controller untuk menangani request terkait Postingan
class PostController extends Controller
{
    // Properti untuk menyimpan instance dari PostService
    protected $postService;

    // Constructor untuk melakukan dependency injection PostService
    // @param PostService $postService Instance dari service post
    public function __construct(PostService $postService)
    {
        // Menyimpan instance service ke properti class
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    // Method untuk menampilkan daftar postingan
    public function index()
    {
        // Mengambil data postingan yang sudah dipaginasi (5 per halaman) dari service
        $posts = $this->postService->getPaginatedPosts(5);
        // Mengembalikan view 'posts.index' dengan data posts
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Method untuk menampilkan form pembuatan postingan baru
    public function create()
    {
        // Mengembalikan view 'posts.create' untuk form input
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Method untuk menyimpan postingan baru ke database
    // @param StorePostRequest $request Request yang sudah divalidasi
    public function store(StorePostRequest $request)
    {
        // Membuat DTO (Data Transfer Object) dari request yang valid dan file gambar
        $dto = \App\DTOs\Post\CreatePostDTO::fromRequest(
            $request->validated(), // Data input yang sudah divalidasi
            $request->file('image') // File gambar yang diupload
        );

        // Memanggil service untuk membuat postingan baru menggunakan data DTO
        $this->postService->createPost($dto);

        // Mengarahkan user kembali ke halaman index posts
        return redirect()->route('posts.index')
            // Menambahkan pesan sukses ke session (flash message)
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // Method untuk menampilkan detail satu postingan
    // @param Post $post Model post yang otomatis di-inject (Route Model Binding)
    public function show(Post $post)
    {
        // Mengembalikan view 'posts.show' dengan data post spesifik
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Method untuk menampilkan form edit postingan
    // @param Post $post Model post yang akan diedit
    public function edit(Post $post)
    {
        // Mengembalikan view 'posts.edit' dengan data post yang akan diedit
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Method untuk memperbarui data postingan
    // @param UpdatePostRequest $request Request validasi update
    // @param Post $post Model post yang akan diupdate
    public function update(UpdatePostRequest $request, Post $post)
    {
        // Membuat DTO update dari request yang valid
        $dto = \App\DTOs\Post\UpdatePostDTO::fromRequest(
            $request->validated(), // Data input tervalidasi
            $request->file('image') // File gambar baru (jika ada)
        );

        // Memanggil service untuk memproses update data post
        $this->postService->updatePost($post, $dto);

        // Mengarahkan kembali ke halaman index
        return redirect()->route('posts.index')
            // Menambahkan pesan sukses
            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Method untuk menghapus postingan
    // @param Post $post Model post yang akan dihapus
    public function destroy(Post $post)
    {
        // Memanggil service untuk menghapus post beserta gambarnya
        $this->postService->deletePost($post);

        // Mengarahkan kembali ke halaman index
        return redirect()->route('posts.index')
            // Menambahkan pesan sukses delete
            ->with('success', 'Post deleted successfully');
    }
}
