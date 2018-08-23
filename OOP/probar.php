<?php
require_once('Celular.php');


$unCelular = new Celular;

$unCelular->setMarca('Motorola');

echo $unCelular->getMarca();

?>
