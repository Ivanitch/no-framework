<?php

declare(strict_types = 1);

namespace App\controllers;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{
    public function indexAction(ServerRequestInterface $request): ResponseInterface
    {
        $html = '<h1>Home page</h1>';

        return new HtmlResponse($html);
    }

    public function aboutAction(ServerRequestInterface $request): ResponseInterface
    {
        $html = '<h1>About page</h1>';

        return new HtmlResponse($html);
    }

}