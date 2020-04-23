<?php
include_once "Logger.php";
class Printer extends Logger
{
    function choseTime($param)
    {
        $now_date = new DateTime('now', new DateTimeZone("Europe/Moscow"));

        if (!$param == 0) {
            $now_date = $now_date->format($param);
            print $now_date . " ";
        }
    }
    function printString($string)
    {
        print $string;
    }

    function putString($text)
    {
        return null;
    }
}