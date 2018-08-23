<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form class="" method="post" enctype="multipart/form-data">
            nombre:
            <input type="text" name="name" value="">
            <br>
            <input type="file" name="archivo" value="">
            <br>
            <button type="submit" name="button">Enviar</button>
        </form>
        <br>
        <br>
        <br>
        <br>
        <br>

        <a href="imagenes/Hola.jpg" download>bajar imagen hola</a>
    </body>
</html>


<?php

if ($_POST) {

    if ($_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
        $name = $_FILES['archivo']['name'];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $archivo = $_FILES['archivo']['tmp_name'];
        $direccion = dirname(__FILE__);
        $direccion = $direccion .'\/imagenes/';
        var_dump($direccion);
        exit;
        if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
            move_uploaded_file($archivo, $direccion.$_POST['name'].'.'.$ext);
        }else {
            echo "Che la extencion no es valida";
        }


    }else {
        echo 'che subi la foto';
    }

}





 ?>
