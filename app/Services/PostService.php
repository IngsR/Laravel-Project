<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function createPost(array $data, $image = null)
    {
        if ($image) {
            $path = $image->store('posts', 'public');
            $data['image'] = $path;
        }

        return Post::create($data);
    }

    public function updatePost(Post $post, array $data, $image = null)
    {
        if ($image) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = $image->store('posts', 'public');
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
