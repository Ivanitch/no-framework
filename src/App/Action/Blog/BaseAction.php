<?php

namespace App\Action\Blog;

use App\Repositories\PostRepository;

class BaseAction
{
    protected PostRepository $repository;

    public function __construct()
    {
        $this->repository = new PostRepository();
    }
}
