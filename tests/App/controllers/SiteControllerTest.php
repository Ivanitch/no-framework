<?php

namespace Tests\App\controllers;

use App\controllers\SiteController;
use Laminas\Diactoros\ServerRequest;
use PHPUnit\Framework\TestCase;

class SiteControllerTest extends TestCase
{
    public function testHomePage()
    {
        $controller = new SiteController();

        $response = $controller->homeAction();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('<h1>Home page</h1>', $response->getBody()->getContents());
    }

    public function testAboutPage()
    {
        $controller = new SiteController();

        $response = $controller->aboutAction();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('<h1>About page</h1>', $response->getBody()->getContents());
    }

    public function testHelloPage()
    {
        $controller = new SiteController();

        $request = (new ServerRequest())
            ->withQueryParams(['name' => 'John']);

        $response = $controller->helloAction($request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('<h1>Hello, John</h1>', $response->getBody()->getContents());
    }
}
