<?php
$k = 0;
$fp = fopen('somefile.txt', "rt");
if ($fp) {
    while (!feof($fp)) {
        $text[$k] = fgets($fp, 999);
        $k++;
    }
} else echo "Error";

$ini_file = parse_ini_file("index.ini", true);

for ($i = 0; $i != $k; $i++) {
    if (strcasecmp(substr($text[$i], 0, strpos($text[$i], " ")), $ini_file['first_rule']['symbol']) == 0) {
        $text[$i] = substr($text[$i], strpos($text[$i], " "), strlen($text[$i]));
        $first = first_rule($text[$i], $ini_file);
        $new_text[$i] = $first;

    } else if (strcasecmp(substr($text[$i], 0, strpos($text[$i], " ")), $ini_file['second_rule']['symbol']) == 0) {
        $text[$i] = substr($text[$i], strpos($text[$i], " "), strlen($text[$i]));
        $second = second_rule($text[$i], $ini_file);
        $new_text[$i] = $second;

    } else if (strcasecmp(substr($text[$i], 0, strpos($text[$i], " ")), $ini_file['third_rule']['symbol']) == 0) {
        $text[$i] = substr($text[$i], strpos($text[$i], " "), strlen($text[$i]));
        $third = third_rule($text[$i], $ini_file);
        $new_text[$i] = $third;

    } else {
        $new_text[$i] = $text[$i];
    }
}

print_ln($new_text, $k);

function first_rule($text, $ini_file)
{
    if ($ini_file['first_rule']['upper'] == "true") {
        $new_text = strtoupper($text);
    } else if ($ini_file['first_rule']['upper'] == "false") {
        $new_text = strtolower($text);
    } else {
        return "Error! В 'upper' принимается только 'true' или 'false'";
    }
    return $new_text;
}


function second_rule($text, $ini_file)
{
    if ($ini_file['second_rule']['direction'] == '+') {
        $new_text = "";
        for ($j = 0; $j != strlen($text); $j++) {
            if (is_numeric($text[$j])) {
                if ($text[$j] == 9) {
                    $new_text .= 0;
                } else $new_text .= $text[$j] + 1;
            } else {
                $new_text .= $text[$j];
            }
        }
        return $new_text;
    } else if ($ini_file['second_rule']['direction'] == '-') {
        $new_text = "";
        for ($j = 0; $j != strlen($text); $j++) {
            if (is_numeric($text[$j])) {
                if ($text[$j] == 0) {
                    $new_text .= 9;
                } else $new_text .= $text[$j] - 1;
            } else {
                $new_text .= $text[$j];
            }
        }
        return $new_text;
    } else if (strcasecmp($ini_file['second_rule']['direction'], "+") != 0 && strcasecmp($ini_file['second_rule']['direction'], "-") != 0) {
        return "Error! В 'direction' принимается только '+' или '-'";
    }
}

function third_rule($text, $ini_file)
{
    $new_text = str_ireplace($ini_file['third_rule']['delete'], "", $text);
    return $new_text;
}

function print_ln($new_text, $index)
{
    for ($i = 0; $i != $index; $i++) {
        print $new_text[$i] . "<br>";
    }
}

fclose($fp);