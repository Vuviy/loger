<?php

namespace App;

use App\Enums\LogLevel;
use App\Interfaces\FormatterInterface;

class DefaultFormatter implements FormatterInterface
{
    public function format(LogLevel $level, string $message, string $class): string
    {
        return sprintf(
            '[%s] [%s] [%s] %s',
            date('Y-m-d H:i:s'),
            $level->name,
            $class,
            $message
        );
    }
}