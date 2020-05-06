<?php

namespace logger;

use DateTime;
use DateTimeZone;

class Logger implements LoggerInterface
{
    public function emergency($message, array $context = [])
    {
        // TODO: Implement emergency() method.
    }

    public function alert($message, array $context = [])
    {
        // TODO: Implement alert() method.
    }

    public function critical($message, array $context = [])
    {
        // TODO: Implement critical() method.
    }

    public function error($message, array $context = [])
    {
        // TODO: Implement error() method.
    }

    public function warning($message, array $context = [])
    {
        // TODO: Implement warning() method.
    }

    public function notice($message, array $context = [])
    {
        // TODO: Implement notice() method.
    }

    public function info($message, array $context = [])
    {
        // TODO: Implement info() method.
    }

    public function debug($message, array $context = [])
    {
        // TODO: Implement debug() method.
    }

    public function log($level, $message, array $context = [])
    {
        $now_date = new DateTime('now', new DateTimeZone("Europe/Moscow"));
        $now_date = $now_date->format("h:i:s");

        $json_code = json_encode([
            'type' => $message,
            'time' => $now_date . " " . date("a"),
            'context' => $context],
            JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $fp = fopen("file.txt", "w");
        fwrite($fp, $json_code);
        fclose($fp);
    }
}