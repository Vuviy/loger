<?php

namespace App\Handlers;

use App\Enums\LogLevel;
use App\Interfaces\HandlerInterface;

readonly class DatabaseHandler implements HandlerInterface
{
    public function __construct(private LogLevel $minLevel) {}

    public function supports(LogLevel $level): bool
    {
        return $level->value >= $this->minLevel->value;
    }

    public function handle(LogLevel $level, string $formattedMessage): void
    {
//    write to db
    }
}