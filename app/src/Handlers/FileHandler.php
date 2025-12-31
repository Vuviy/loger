<?php

namespace App\Handlers;

use App\Enums\LogLevel;
use App\Interfaces\HandlerInterface;

readonly class FileHandler implements HandlerInterface
{
    private const MAX_SIZE = 10 * 1024 * 1024;

    public function __construct(private string $filePath, private LogLevel $minLevel) {}

    public function supports(LogLevel $level): bool
    {
        return $level->value >= $this->minLevel->value;
    }

    public function handle(LogLevel $level, string $formattedMessage): void
    {
        $this->rotateIfNeeded();

        file_put_contents(
            $this->filePath,
            $formattedMessage . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }

    private function rotateIfNeeded(): void
    {
        if (!file_exists($this->filePath)) {
            return;
        }

        if (filesize($this->filePath) < self::MAX_SIZE) {
            return;
        }

        $rotated = $this->filePath . '.' . date('Y-m-d H:i:s');
        rename($this->filePath, $rotated);
    }
}