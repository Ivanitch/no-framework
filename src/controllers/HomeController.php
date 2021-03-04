<?php declare(strict_types = 1);

namespace App\controllers;

use Http\Response;

class HomeController
{
    private Response $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function show()
    {
        $this->response->setContent('Home page');
    }

    public function about()
    {
        $this->response->setContent('About page');
    }

}