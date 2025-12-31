<?php

declare(strict_types=1);

use App\DefaultFormatter;
use App\Enums\LogLevel;
use App\Handlers\FileHandler;
use App\Logger;
use App\TestController;

require __DIR__ . '/functions/functions.php';
require __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/config.php';


$formatterClass = $config['formatter'];
$formatter = new $formatterClass();

$handlers = [];
foreach ($config['handlers'] as $handlerConfig) {
    $class = $handlerConfig['class'];
    $options = $handlerConfig['options'];
    $handlers[] = new $class(...array_values($options));
}

$logger = new Logger($formatter, $handlers);

$class = new TestController($logger);

$class->test();