<?php

namespace Test\App\Action\Blog;

use App\Action\Blog\View;
use Laminas\Diactoros\ServerRequest;
use PHPUnit\Framework\TestCase;

class PostNotFoundTest extends TestCase
{
    public function testPostNotFound()
    {
        $action = new View();

        $request = (new ServerRequest())
            ->withAttribute('slug', 'post-5');

        $response = $action($request);

        $this->assertEquals(404, $response->getStatusCode());
    }
}
