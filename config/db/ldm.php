<?php

return [
    'mysql_ldw' => [
        'driver' => env('DB_CONNECTION_LDW'),
        'host' => env('DB_HOST_LDW'),
        'port' => env('DB_PORT_LDW'),
        'database' => env('DB_DATABASE_LDW'),
        'username' => env('DB_USERNAME_LDW'),
        'password' => env('DB_PASSWORD_LDW'),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci'
    ],
    'mysql_ldr' => [
        'driver' => env('DB_CONNECTION_LDR'),
        'host' => env('DB_HOST_LDR'),
        'port' => env('DB_PORT_LDR'),
        'database' => env('DB_DATABASE_LDR'),
        'username' => env('DB_USERNAME_LDR'),
        'password' => env('DB_PASSWORD_LDR'),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci'
    ]
];
