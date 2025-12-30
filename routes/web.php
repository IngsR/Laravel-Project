<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::latest()->take(6)->get();
    return view('welcome', compact('posts'));
});

// Public Blog Routes (no authentication required)
Route::get('/blog', function () {
    $posts = Post::latest()->paginate(9);
    return view('blog.index', compact('posts'));
})->name('blog.index');

Route::get('/blog/{post}', function (Post $post) {
    $relatedPosts = Post::where('id', '!=', $post->id)->latest()->take(3)->get();
    return view('blog.show', compact('post', 'relatedPosts'));
})->name('blog.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('products', ProductController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('posts', PostController::class);
});

require __DIR__.'/auth.php';

Route::get('/admin/register', [\App\Http\Controllers\Auth\AdminRegistrationController::class, 'create'])->name('admin.register');
Route::post('/admin/register', [\App\Http\Controllers\Auth\AdminRegistrationController::class, 'store']);

Route::get('/debug-users-schema', function () {
    $schema = Illuminate\Support\Facades\Schema::getColumnListing('users');
    return response()->json($schema);
});
