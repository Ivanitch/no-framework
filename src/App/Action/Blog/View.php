<?php

namespace App\Action\Blog;

use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class View extends BaseAction
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $slug = $request->getAttribute('slug');
        $post = $this->repository->findOne($slug);

        if (! $post) return new HtmlResponse('Post not found', 404);

        return new JsonResponse($post);
    }
}
