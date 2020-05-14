<?php
session_start();
if (isset($_POST['text'])) {
    $text = $_POST['text'];

    if (!isset($_COOKIE["text"])) {
        setcookie("text", $text);
        $_COOKIE = $text;
    }
    header("Location: http://localhost:63342/untitled/12/index_for_2.php?text=$text");
} else include "2.php";
