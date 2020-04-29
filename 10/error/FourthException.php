<?php

namespace error;
trait FourthException
{
    private function getFileError($x)
    {

        if (!file_exists($x)) {
            throw new \Exception('Файл не найден!');
        }
    }

    public function tryFileCatch($x)
    {
        try {
            $this->getFileError($x);
        } catch (\Exception $e) {
            echo 'Error: ', $e->getMessage() . "<br>";
        }
    }
}