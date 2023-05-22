<?php

namespace App\Repositories\Interfaces;

interface PostRepositoryInterface
{
    public function getPosts(): array;
    public function getPost(string $slug): array|null;
    public function savePost(array $data): array;
}
