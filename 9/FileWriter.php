<?php
include_once "Logger.php";
class FileWriter extends Logger
{

    private $fp;

    function __construct($fileName)
    {
        $this->fp = fopen($fileName, "w");
    }

    function putString($text)
    {
        if ($this->fp) {
            fwrite($this->fp, $text);
        }
    }

    function __destruct()
    {
        fclose($this->fp);
    }

    function printString($text)
    {
        return null;
    }
}

