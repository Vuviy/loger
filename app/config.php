<?php
declare(strict_types=1);

use App\Enums\LogLevel;


return [
    'handlers' => [
        [
            'class' => \App\Handlers\FileHandler::class,
            'options' => [
                'filePath' => '/var/www/html/logs/app.log',
                'minLevel' => LogLevel::INFO,
            ],
        ],
        [
            'class' => \App\Handlers\DatabaseHandler::class,
            'options' => [
                'minLevel' => LogLevel::ERROR,
            ],
        ],
        [
            'class' => \App\Handlers\EmailHandler::class,
            'options' => [
                'email' => 'exapmle@gmail.com',
                'minLevel' => LogLevel::CRITICAL,
            ],
        ],
    ],
    'formatter' => \App\DefaultFormatter::class,
];
