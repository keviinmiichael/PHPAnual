<?php
$colores = [
    'red' => 'rojo',
    'blue' => 'azul',
    'yellow' => 'amarillo',
];
$color = '';
if (isset($_COOKIE['color'])) {
    $color = $_COOKIE['color'];
}
if ($_POST) {
    $color = $_POST['color'];
    setcookie('color', $color, time()+5);
}



 ?>



 <!DOCTYPE html>
 <html lang="en" dir="ltr">
     <head>
         <meta charset="utf-8">
         <title>Color</title>
     </head>
     <body style="background-color:<?=$color?>">
         <form class="" action="" method="post">
             Color de fondo de pantalla:
             <select class="" name="color">
                 <option value="">Elegi tu color</option>
                 <?php foreach ($colores as $key => $value): ?>
                     <option value="<?=$key?>"><?=$value?></option>
                 <?php endforeach; ?>
             </select>
             <br>
             <button type="submit">Enviar</button>
         </form>
     </body>
 </html>
