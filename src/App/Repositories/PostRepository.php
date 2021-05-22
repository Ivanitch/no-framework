<?php

namespace App\Repositories;

class PostRepository
{
    public array $posts = [
        ['id' => 2, 'title' => 'Post #2', 'slug' => 'post-2'],
        ['id' => 1, 'title' => 'Post #1', 'slug' => 'post-1'],
    ];

    public function findAll(): array
    {
        return $this->posts;
    }

    public function findOne(string $slug): ?array
    {
        $post = [];

        foreach ($this->posts as $item) {

            if (in_array($slug, $item)) {
                $post = $item;
            }
        }

        return $post;
    }
}