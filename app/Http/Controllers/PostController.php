<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    public function __construct(
        private PostRepositoryInterface $postRepo
    ) {}

    public function index()
    {
        return response()->json($this->postRepo->getPosts());
    }

    public function single(string $slug)
    {
        return response()->json($this->postRepo->getPost($slug));
    }

    public function store(StorePostRequest $request)
    {
        return response()->json($this->postRepo->savePost($request->validated()), 201);
    }
}
