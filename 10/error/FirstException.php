<?php

namespace error;
trait FirstException
{

    private function getDevError($x)
    {
        if (!$x) {
            throw new \Exception('Деление на ноль!');
        }
    }

    public function tryDevCatch($x)
    {
        try {
            $this->getDevError($x);
        } catch (\Exception $e) {
            echo 'Error: ', $e->getMessage() . "<br>";
        }
    }
}
