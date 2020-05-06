<?php
spl_autoload_register();

if (isset($_POST["type"]) && isset($_POST["text"])) {
    $type = $_POST["type"];
    $text = explode(" ", $_POST["text"]);
    $text_array = array(0);
    $index = 0;

    foreach ($text as $value) {
        $text_array[$index] = $value;
        $index++;
    }

    $logger = new \logger\Logger();
    $logger->log(1, $type, $text_array);
} else include "11.html";