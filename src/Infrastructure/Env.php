<?php

namespace Compras\Infrastructure;

use Dotenv\Dotenv;

class Env
{
    public static function load()
    {
        (new Dotenv(__DIR__.'/../../'))->load();
    }
}
