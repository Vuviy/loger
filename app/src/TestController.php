<?php

namespace App;

use App\Enums\LogLevel;

class TestController
{

    use LoggerTrait;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function test() {
        $this->log(LogLevel::ERROR, 'test' . rand(1, 100));
        echo 'test method TestController';
    }
}