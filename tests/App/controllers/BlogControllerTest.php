<?php

namespace Test\App\controllers;

use App\Controllers\BlogController;
use Laminas\Diactoros\ServerRequest;
use PHPUnit\Framework\TestCase;

class BlogControllerTest extends TestCase
{
    public function testIndexPage()
    {
        $controller = new BlogController();

        $response = $controller->indexAction();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(
            '[{"id":2,"title":"Post #2","slug":"post-2"},{"id":1,"title":"Post #1","slug":"post-1"}]',
            $response->getBody()->getContents()
        );
    }

    public function testViewPage()
    {
        $controller = new BlogController();

        $request = (new ServerRequest())
            ->withAttribute('slug', 'post-1');

        $response = $controller->viewAction($request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('{"id":1,"title":"Post #1","slug":"post-1"}', $response->getBody()->getContents());
    }

    public function testPostNotFound()
    {
        $controller = new BlogController();

        $request = (new ServerRequest())
            ->withAttribute('slug', 'post-5');

        $response = $controller->viewAction($request);

        $this->assertEquals(404, $response->getStatusCode());
    }
}
