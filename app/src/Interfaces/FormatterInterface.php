<?php

namespace App\Interfaces;

use App\Enums\LogLevel;

interface FormatterInterface
{
    public function format(LogLevel $level, string $message, string $class): string;

}