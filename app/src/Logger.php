<?php

namespace App;

use App\Enums\LogLevel;
use App\Interfaces\FormatterInterface;
use App\Interfaces\LoggerInterface;

readonly class Logger implements LoggerInterface
{
    public function __construct(private FormatterInterface $formatter, private array $handlers) {}

    public function log(LogLevel $level, string $message, string $class): void
    {
        $formatted = $this->formatter->format(
            $level,
            $message,
            $class
        );

        foreach ($this->handlers as $handler) {
            if ($handler->supports($level)) {
                $handler->handle($level, $formatted);
            }
        }
    }
}