<?php

declare(strict_types = 1);

namespace App\controllers;

use Http\Request;
use Http\Response;

class HomeController
{
    private Request $request;
    private Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function show()
    {
        $content = '<h1>Home page</h1>';
        $content .= 'Hello ' . $this->request->getParameter('name', 'guest');
        $this->response->setContent($content);
    }

    public function about()
    {
        $this->response->setContent('About page');
    }

}