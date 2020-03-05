<?php


if (isset($_REQUEST["text"])) {
    $text = $_REQUEST["text"];
    getText($text);
} else include "3.html";

function getText($text) {
    $array_sort = array(0);
    $text_array = array(0);
    $k = 0;
    $index = 0;

    $text = explode("\n", $text);

    foreach ($text as $value) {
         $text_array[$index] = $value;
         $index++;
    }

    foreach ($text as $value) {
        $text_array[$index] = explode(" ", $value);
        shuffle($text_array[$index]);
        $text_array[$index] = implode(" ", $text_array[$index]);
        $index++;
    }

    foreach ($text_array as $value) {
        print $value . "<br>";
    }

//    foreach ($text_array as $value) {
//        $array_sort[$k] = explode(" ", $value);
//        $k++;
//    }

//    uasort($array_sort, function ($s1, $s2){
//       print strcmp($s1[1], $s2[1]);
//    });

}