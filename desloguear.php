<?php

session_start();

setcookie('nombre', '', time()-10);

session_destroy();

header('location:clase09.php');

 ?>
