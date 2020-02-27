<?php
$text = $_REQUEST["text"];
$user_input = $_REQUEST["user_input"];

$char = array(0);
$index_char = 0;
$open = 0;
$close = 0;
$j = 0;

for ($i = 0; $i < strlen($text); ++$i) {
    switch ($text[$i]) {
        case "+":
            $char[$index_char]++;
            break;

        case "-":
            $char[$index_char]--;
            break;

        case "<":
            $index_char--;
            if (!isset($char[$index_char])) {
                $char[$index_char] = 0;
            }
            break;

        case ">":
            $index_char++;
            if (!isset($char[$index_char])) {
                $char[$index_char] = 0;
            }
            break;

        case ",":
            $array[$index_char] = ord($user_input[$j]);
            $j++;
            break;

        case "[":
            if ($char[$index_char] == 0) {
                $open++;
                while ($open != 0) {
                    $i++;
                    if ($text[$i] == "[") {
                        $open++;
                    } else if ($text[$i] == "]") {
                        $open--;
                    }
                }
            }
            break;

        case "]":
            if ($char[$index_char] != 0) {
                $close++;
                if ($char[$index_char] != 0) {
                    while ($close != 0) {
                        $i--;
                        if ($text[$i] == "]") {
                            $close++;
                        } else if ($text[$i] == "[") {
                            $close--;
                        }
                    }
                }
            }
            break;

        case ".":
            print(chr($char[$index_char]));
            break;
    }
}
