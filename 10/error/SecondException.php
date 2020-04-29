<?php

namespace error;
trait SecondException
{
    private function getEvenError($x)
    {

        if ($x % 2 != 0) {
            throw new \Exception('Не четное число!');
        }
    }

    public function tryEvenCatch($x)
    {
        try {
            $this->getEvenError($x);
        } catch (\Exception $e) {
            echo 'Error: ', $e->getMessage() . "<br>";
        }
    }
}