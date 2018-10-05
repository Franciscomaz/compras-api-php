<?php

date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__.'/error_log.txt');
error_reporting(E_ALL);

use Compras\Infrastructure\Env;
use Compras\Infrastructure\Database;

require __DIR__.'/vendor/autoload.php';

Env::load();
Database::conectar();

$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$app = new \Slim\App($config);

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

require __DIR__.'/routes/pedidos.php';
require __DIR__.'/routes/produtos.php';

$app->run();
