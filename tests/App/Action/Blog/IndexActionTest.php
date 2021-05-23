<?php

namespace Test\App\Action\Blog;

use App\Action\Blog\Index;
use PHPUnit\Framework\TestCase;

class IndexActionTest extends TestCase
{
    public function testIndexPage()
    {
        $action = new Index();

        $response = $action();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(
            '[{"id":2,"title":"Post #2","slug":"post-2"},{"id":1,"title":"Post #1","slug":"post-1"}]',
            $response->getBody()->getContents()
        );
    }
}
