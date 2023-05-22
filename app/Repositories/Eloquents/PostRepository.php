<?php

namespace App\Repositories\Eloquents;

use Illuminate\Support\Str;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    function getPosts(): array
    {
        // Retrieve all posts
        $posts = Post::latest()->get()->toArray();

        // Return the posts data
        return $posts;
    }

    function getPost(string $slug): array|null
    {
        // Retrieve post by id
        return Post::whereSlug($slug)->first()?->toArray();
    }

    function savePost(array $data): array
    {
        // Create post and return it
        $data['slug'] = Str::slug($data['title']);
        return Post::create($data)->toArray();
    }
}
