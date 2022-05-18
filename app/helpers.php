<?php

/**
 * @return string|null
 */
function getRemoteAddr(): string
{
    return $_SERVER['REMOTE_ADDR'] ?? '';
}

/**
 * @return string
 */
function getHttpHost(): string
{
    return $_SERVER['HTTP_HOST'] ?? '';
}

/**
 * @return string
 */
function getDevEnvironment(): string
{
    $local = ['localhost', '127.0.0.1'];
    $real = ['www', 'cc', 'psn', 'api'];
    $host = explode('.', getHttpHost())[0];

    if (in_array(getRemoteAddr(), $local)) return 'local';

    if (in_array($host, $real)) return 'real';

    if (substr($host, 0, 2) === 'rd') return 'release';

    return 'development';
}
