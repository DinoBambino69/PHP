<?php require_once "../4/generator.php"; ?>
<pre>
    <h1>Задание 1</h1>
    <?php
    if (isset($_REQUEST["text"])) {
        $text = $_REQUEST["text"];
        getText($text);
    } else include "text.html";


    function getText($text)
    {

        $data_array = array(0);
        $sum = 0;
        $index = 0;
        $data_array2 = array(0);
        $text = str_replace("\n", "", $text);
        $text = explode("\r", $text);

        foreach ($text as $value) {
            $sum += (int)substr($value, strrpos($value, " ") + 1, strlen($value));
        }

        foreach ($text as $value) {
            $data_array[$index] = [
                "text" => substr($value, 0, strlen($value) - (strlen($value) - strrpos($value, " "))),
                "weight" => (int)substr($value, strrpos($value, " ") + 1, strlen($value)),
                "probability" => round(((int)substr($value, strrpos($value, " ") + 1, strlen($value)) / $sum), 3, PHP_ROUND_HALF_UP)
            ];
            $data_array2[$index] = [
                "text" => substr($value, 0, strlen($value) - (strlen($value) - strrpos($value, " "))),
                "count" => (int)0,
                "calculated_probability" => 0,
            ];
            $index++;
        }

        $text_array = ["sum" => $sum, "data" => $data_array];

        print json_encode($text_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        echo "<br>";
        echo "<h1>Задание 2</h1>";
        generator($data_array2, $text_array);
    }

    ?>
    <pre>

