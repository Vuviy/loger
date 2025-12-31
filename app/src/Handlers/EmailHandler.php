<?php

namespace App\Handlers;

use App\Enums\LogLevel;
use App\Interfaces\HandlerInterface;

readonly class EmailHandler implements HandlerInterface
{
    public function __construct(private string $email, private LogLevel $minLevel) {}
    public function handle(LogLevel $level, string $formattedMessage): void
    {
        $this->email;
        // send email;
    }

    public function supports(LogLevel $level): bool
    {
        return $level->value >= $this->minLevel->value;
    }
}