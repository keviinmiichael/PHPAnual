<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form class="" action="" method="post">
            Nombre
            <input type="text" name="nombre" value="">
            <br>
            <button type="submit" name="button">Enviar</button>
        </form>
    </body>
</html>

<?php
session_start();
if (isset($_COOKIE['nombre'])) {
    $_SESSION['nombre'] = $_COOKIE['nombre'];
    header('location:otrapagina.php');
}

if ($_POST) {

    $_SESSION['nombre'] = $_POST['nombre'];

}

if (isset($_SESSION['nombre'])) {
    var_dump($_SESSION['nombre']);
}





 ?>
