<?php

namespace App\Action;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Contact
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return new HtmlResponse('Contact page');
    }
}