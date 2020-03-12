<pre>
<?php
function generator($data_array2, $text_array)
{

    $sum = $text_array["sum"];
    $data = $text_array["data"];

    foreach (start($sum, $data) as $value) {
        $new_data = $text_array["data"];
        $search = array_search($value, $new_data);
        $data_array2[$search]["count"]++;
        $data_array2[$search]["calculated_probability"] = $data_array2[$search]["count"] / 10000;
    }
    print json_encode($data_array2, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

function start($sum, $data)
{
    for ($i = 0; $i < 1000; $i++) {
        $random = mt_rand($min = 1, $max = $sum);
        $index = -1;
        $num = 0;

        while ($num < $random && $num != $sum) {
            $index++;
            $num += (int)$data[$index]["weight"];
        }
        yield $data[$index];
    }
}

?>
</pre>
