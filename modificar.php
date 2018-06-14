<?php
    session_start();

    if (isset($_POST['incrementar'])) {
        if (isset($_SESSION['contador'])) {
            $_SESSION['contador']++;
        } else {
            $_SESSION['contador'] = 0;
        }
    }

    if (isset($_POST['reiniciar'])) {
        $_SESSION['contador'] = 0;
    }
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1> <?php echo isset($_SESSION['contador']) ? $_SESSION['contador'] : 'Contador sin inicializar' ?> </h1>
        <form method="post">
            <button type="submit" name="incrementar">Incrementar</button>
            <button type="submit" name="reiniciar">Reiniciar</button>
        </form>
    </body>
</html>
