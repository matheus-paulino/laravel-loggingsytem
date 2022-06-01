<?php

namespace App\Logging;

use Monolog\Logger;

class MysqlLogger
{
    public function __invoke(array $config): Logger
    {
        $logger = new Logger("mysql");
        return $logger->pushHandler(new MysqlLoggingHandler());
    }
}
