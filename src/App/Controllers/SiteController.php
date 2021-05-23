<?php

declare(strict_types = 1);

namespace App\Controllers;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class SiteController
{
    public function homeAction(): ResponseInterface
    {
        $html = '<h1>Home page</h1>';

        return new HtmlResponse($html);
    }

    public function aboutAction(): ResponseInterface
    {
        $html = '<h1>About page</h1>';

        return new HtmlResponse($html);
    }

    public function helloAction(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams() ?? null;

        if (isset($queryParams['name']) && !empty($queryParams['name'])) {
            $name = $queryParams['name'];
        } else {
            $name = 'Guest';
        }

        return new HtmlResponse('<h1>Hello, ' . $name . '</h1>');
    }
}