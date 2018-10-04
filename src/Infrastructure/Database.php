<?php

namespace Compras\Infrastructure;

use Illuminate\Database\Capsule\Manager;

class Database
{
    public static function conectar()
    {
        $capsule = new Manager();
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => getenv('DB_HOST'),
            'database'  => getenv('DB_NAME'),
            'username'  => getenv('DB_USER'),
            'password'  => getenv('DB_PASS'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ], 'default');
        $capsule->bootEloquent();
    }
}
