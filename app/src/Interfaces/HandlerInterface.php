<?php

namespace App\Interfaces;

use App\Enums\LogLevel;

interface HandlerInterface
{
    public function handle(LogLevel $level, string $formattedMessage): void;

    public function supports(LogLevel $level): bool;
}