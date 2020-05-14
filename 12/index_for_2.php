<?php


if (isset($_POST["text"])) {
    $text = $_POST["text"];
    getValue($text);
} else include("2.php");

function getValue($text) {
    $newText = "";
    foreach ($gener = generation($text) as $symbol) {
        $newText .= $symbol;
    }
    print "NewText = " . $newText;
    print "; Число замен = " . $gener -> getReturn();
}

function generation($text = "") {
    $count = 0;
    for ($i = 0; $i < strlen($text); $i++) {

        switch ($text[$i]) {

            case "h" :
                $text[$i] = 4;
                yield $text[$i];
                $count++;
                break;

            case "i" :
                $text[$i] = 1;
                yield $text[$i];
                $count++;
                break;

            case "e" :
                $text[$i] = 3;
                yield $text[$i];
                $count++;
                break;

            case "o" :
                $text[$i] = 0;
                yield $text[$i];
                $count++;
                break;

            default: yield $text[$i];
        }
    }
    return $count;
}