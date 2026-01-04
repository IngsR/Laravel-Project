<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function getPaginatedPosts(int $perPage = 5)
    {
        return Post::latest()->paginate($perPage);
    }

    public function createPost(\App\DTOs\Post\CreatePostDTO $dto)
    {
        $data = $dto->toArray();

        if ($dto->image) {
            $path = $dto->image->store('posts', 'public');
            $data['image'] = $path;
        }

        return Post::create($data);
    }

    public function updatePost(Post $post, \App\DTOs\Post\UpdatePostDTO $dto)
    {
        $data = $dto->toArray();

        if ($dto->image) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = $dto->image->store('posts', 'public');
            $data['image'] = $path;
        }

        $post->update($data);
        return $post;
    }

    public function deletePost(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
    }
}
