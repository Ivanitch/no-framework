<?php

namespace Framework;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class ErrorHandler
{
    public function __construct($environment)
    {
        $whoops = new Run;
        if ($environment !== 'prod') {
            $whoops->pushHandler(new PrettyPageHandler);
        } else {
            $whoops->pushHandler(function($e){
                echo 'Todo: Friendly error page and send an email to the developer';
            });
        }
        $whoops->register();
    }
}
