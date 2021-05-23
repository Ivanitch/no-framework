<?php

namespace App\Action\Blog;

use Laminas\Diactoros\Response\JsonResponse;

class Index extends BaseAction
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse($this->repository->findAll());
    }
}
