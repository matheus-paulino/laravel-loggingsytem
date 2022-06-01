<?php

namespace App\Logging;

use Illuminate\Support\Facades\DB;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class MysqlLoggingHandler extends AbstractProcessingHandler
{
    private string $table;

    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        $this->table = 'logs';
        parent::__construct($level, $bubble);
    }

    protected function write(array $record): void
    {
        $data = [
            'message' => $record['message'],
            'action' => $record['context']['action'] ?? 'general',
            'user' => $record['context']['user'] ?? 'not_provided',
            'context' => json_encode($record['context']),
            'level' => $record['level'],
            'level_name' => $record['level_name'],
            'channel' => $record['channel'],
            'record_datetime' => $record['datetime']->format('d-m-Y H:i:s'),
            'extra' => json_encode($record['extra']),
            'formatted' => $record['formatted'],
            'remote_addr' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'request_method' => $_SERVER['REQUEST_METHOD'],
            'created_at' => now()
        ];

        DB::connection()->table($this->table)->insert($data);
    }
}
