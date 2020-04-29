<?php

namespace error;
trait FifthException
{
    private function getStringError($x)
    {

        if (!preg_match('/[A-ZА-ЯЁ]/', $x)) {
            throw new \Exception('Строка должна содержать хотя бы одну заглавную букву!');
        }
    }

    public function tryStringCatch($x)
    {
        try {
            $this->getStringError($x);
        } catch (\Exception $e) {
            echo 'Error: ', $e->getMessage() . "<br>";
        }
    }
}