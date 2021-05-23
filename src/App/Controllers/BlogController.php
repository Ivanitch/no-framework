<?php

namespace App\Controllers;

use App\Repositories\PostRepository;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class BlogController
{
    private PostRepository $repository;

    public function __construct()
    {
        $this->repository = new PostRepository();
    }


    public function indexAction(): ResponseInterface
    {
        return new JsonResponse($this->repository->findAll());
    }

    public function viewAction(ServerRequestInterface $request): ResponseInterface
    {
        $slug = $request->getAttribute('slug');
        $post = $this->repository->findOne($slug);

        if (! $post) return new HtmlResponse('Post not found', 404);

        return new JsonResponse($post);
    }
}