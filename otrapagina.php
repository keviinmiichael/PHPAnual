<?php
session_start();
var_dump($_COOKIE['nombre']);
echo "<br>";
echo "<br>";
var_dump($_SESSION);




 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <br><br>
        <a href="desloguear.php">desloguear</a>
    </body>
</html>
