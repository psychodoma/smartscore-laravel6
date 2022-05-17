<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

$local = ['localhost', '127.0.0.1'];

$host = $_SERVER['REMOTE_ADDR'];
if (!in_array($host, $local)) {
    $host = explode('.', $_SERVER['HTTP_HOST'])[0];
    if (substr($host, 0, 2) === 'rd') $host = 'rd';
}

switch($host) {
    case 'localhost':
    case '127.0.0.1':
        $app->loadEnvironmentFrom('.env.local'); // 개인 로컬
        break;
    case 'www':
    case 'cc':
    case 'psn':
    case 'api':
        $app->loadEnvironmentFrom('.env'); // 상용
        break;
    case 'rd':
        $app->loadEnvironmentFrom('.env.release'); // rd 서버
        break;
    default:
        $app->loadEnvironmentFrom('.env.development'); // td
        break;
};

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
