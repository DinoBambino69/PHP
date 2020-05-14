<?php

namespace logger;

use DateTime;
use DateTimeZone;
use Psr\Log\LogLevel;

class Logger implements LoggerInterface
{

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

    public function emergency($message, array $context = [])
    {
        $this->log(LogLevel::EMERGENCY, $message);
    }

    public function alert($message, array $context = [])
    {
        $this->log(LogLevel::ALERT, $message);
    }

    public function critical($message, array $context = [])
    {
        $this->log(LogLevel::CRITICAL, $message);
    }

    public function error($message, array $context = [])
    {
        $this->log(LogLevel::ERROR, $message);
    }

    public function warning($message, array $context = [])
    {
        $this->log(LogLevel::WARNING, $message);
    }

    public function notice($message, array $context = [])
    {
        $this->log(LogLevel::NOTICE, $message);
    }

    public function info($message, array $context = [])
    {
        $this->log(LogLevel::INFO, $message);
    }

    public function debug($message, array $context = [])
    {
        $this->log(LogLevel::DEBUG, $message);
    }
}