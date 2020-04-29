<?php


class Main
{

    use \error\FirstException, \error\SecondException, \error\ThirdException, \error\FourthException, \error\FifthException;

    private $count = 0;

    function startOne()
    {
        while ($this->count != 2) {
            switch (rand(1, 5)) {
                case 1:
                    $this->tryDevCatch(rand(0, 1));
                    break;
                case 2:
                    $this->tryEvenCatch(rand(1, 2));
                    break;
                case 3:
                    $this->third();
                    break;
                case 4:
                    $this->four();
                    break;
                case 5:
                    $this->five();
                    break;
            }
            $this->count++;
        }
        $this->count = 0;
    }

    function startTwo()
    {
        while ($this->count != 2) {
            switch (rand(1, 5)) {
                case 1:
                    $this->tryDevCatch(rand(0, 1));
                    break;
                case 2:
                    $this->tryEvenCatch(rand(1, 2));
                    break;
                case 3:
                    $this->third();
                    break;
                case 4:
                    $this->four();
                    break;
                case 5:
                    $this->five();
                    break;
            }
            $this->count++;
        }
        $this->count = 0;
    }

    function startThree()
    {
        while ($this->count != 2) {
            switch (rand(1, 5)) {
                case 1:
                    $this->tryDevCatch(rand(0, 1));
                    break;
                case 2:
                    $this->tryEvenCatch(rand(1, 2));
                    break;
                case 3:
                    $this->third();
                    break;
                case 4:
                    $this->four();
                    break;
                case 5:
                    $this->five();
                    break;
            }
            $this->count++;
        }
        $this->count = 0;
    }

    function startFour()
    {
        while ($this->count != 2) {
            switch (rand(1, 5)) {
                case 1:
                    $this->tryDevCatch(rand(0, 1));
                    break;
                case 2:
                    $this->tryEvenCatch(rand(1, 2));
                    break;
                case 3:
                    $this->third();
                    break;
                case 4:
                    $this->four();
                    break;
                case 5:
                    $this->five();
                    break;
            }
            $this->count++;
        }
        $this->count = 0;
    }

    private function third()
    {
        $x = rand(1, 2);
        if ($x == 1) {
            $this->tryNullCatch(null);
        } else $this->tryNullCatch("text");
    }

    private function four()
    {
        $x = rand(1, 2);
        if ($x == 2) {
            $this->tryFileCatch("test");
        } else $this->tryFileCatch("nothing");
    }

    private function five()
    {
        $x = rand(1, 2);
        if ($x == 1) {
            $this->tryStringCatch("TesT Good");
        } else $this->tryStringCatch("not good");
    }
}