<?php

require __DIR__ . '/../vendor/autoload.php';

use Application\Http\Kernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

define('APPLICATION_ENV', getenv('APPLICATION_ENV') ?: 'development');

$debug = (APPLICATION_ENV === 'development');

if ($debug) {
    Debug::enable();
}

$kernel = new Kernel(APPLICATION_ENV, $debug);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
