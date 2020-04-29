<?php

namespace error;
trait ThirdException
{
    private function getNullError($x)
    {

        if (!isset($x)) {
            throw new \Exception('Передано null!');
        }
    }

    public function tryNullCatch($x)
    {
        try {
            $this->getNullError($x);
        } catch (\Exception $e) {
            echo 'Error: ', $e->getMessage() . "<br>";
        }
    }

}