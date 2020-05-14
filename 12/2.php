<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>hw2</title>
</head>
<body>
<form action="index_for_2.php" method="post">
    <input type="text" name="text" placeholder="text" value="
<?php
    if (isset($_COOKIE["text"])) {
        print $_COOKIE["text"];
    }
?>
">
    <input type="submit" placeholder="GO!">
</form>
</body>
</html>