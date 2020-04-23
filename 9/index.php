<?php
include_once "FileWriter.php";
include_once "Printer.php";

if (isset($_POST["text"])) {
    $text = $_POST["text"];

    if (isset($_POST["file"])) {
        $command = $_POST["file"];
    }

    if (isset($_POST["print"])) {
        $command = $_POST["print"];
    }

    switch ($command) {
        case "file":
            $fileName = $_POST["fileName"];
            $fileWriter = new FileWriter($fileName);
            $fileWriter->putString($text);
            print "Success";
            break;

        case "print":
            $param = 0;
            if (isset($_POST["DT"])) $param = $_POST["DT"];
            else if (isset($_POST["T"])) $param = $_POST["T"];
            else if (isset($_POST["Off"])) $param = $_POST["Off"];
            $printer = new Printer();
            $printer->choseTime($param);
            $printer->printString($text);
            break;
    }

    checkUpper($text);

} else include "9.html";

function checkUpper($text) {

    $flag = strlen(preg_replace('/[^A-ZА-ЯЁ]/', '', $text));

    if ($flag) {
        print "<br>Строка " . $text . " содержит заглавные буквы";
    } else print "<br>Строка " . $text . " не содержит заглавные буквы";

}