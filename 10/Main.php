<?php


class Main
{

    function start()
    {
        $goodClass = new GoodClass();
        try {
            $goodClass->first();
        } catch (\error\FirstException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (\error\SecondException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }

        try {
            $goodClass->second();
        } catch (\error\ThirdException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (\error\FourthException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }

        try {
            $goodClass->third();
        } catch (\error\FifthException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (\error\ThirdException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }

        try {
            $goodClass->four();
        } catch (\error\SecondException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (\error\ThirdException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }
}