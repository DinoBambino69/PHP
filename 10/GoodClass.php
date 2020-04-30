<?php

class GoodClass {

    function first() {
        $x = rand(0, 1);
        if (!$x) {
            throw new \error\FirstException("Деление на 0!");
        }
        if ($x % 2 != 0) {
            throw new \error\SecondException('Не четное число!');
        }
    }

    function third() {
        $x = rand(1, 2);
        if ($x == 1) {
            throw new \error\ThirdException("Передано null!");
        }
        if ($x == 2) {
            throw new \error\FifthException('Строка должна содержать хотя бы одну заглавную букву!');
        }
    }

    function second() {
        $x = rand(1, 2);
        if ($x == 1) {
            throw new \error\ThirdException("Передано null!");
        }
        if ($x == 2) {
            throw new \error\FourthException("Файл не найден!");
        }
    }

    function four() {
        $x = rand(1, 2);
        if ($x == 1) {
            throw new \error\SecondException('Не четное число!');
        }
        if ($x == 2) {
            throw new \error\ThirdException("Передано null!");
        }
    }
}