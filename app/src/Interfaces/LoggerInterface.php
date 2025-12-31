<?php

namespace App\Interfaces;

use App\Enums\LogLevel;

interface LoggerInterface
{
    public function log(LogLevel $level, string $message, string $class): void;

}