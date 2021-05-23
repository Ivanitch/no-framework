<?php

namespace Test\App\Action\Blog;

use App\Action\Blog\View;
use Laminas\Diactoros\ServerRequest;
use PHPUnit\Framework\TestCase;

class ViewActionTest extends TestCase
{
    public function testViewPage()
    {
        $action = new View();

        $request = (new ServerRequest())
            ->withAttribute('slug', 'post-1');

        $response = $action($request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('{"id":1,"title":"Post #1","slug":"post-1"}', $response->getBody()->getContents());
    }
}
