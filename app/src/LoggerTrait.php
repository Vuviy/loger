<?php

namespace App;

use App\Enums\LogLevel;

trait LoggerTrait
{
    protected Logger $logger;

    protected function log(LogLevel $level, string $message): void
    {
        $this->logger->log(
            $level,
            $message,
            static::class
        );
    }
}