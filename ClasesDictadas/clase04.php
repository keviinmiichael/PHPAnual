<?php
$numeroMagico = 789;

$variable = 9;

function mayor($numA,$numB,$numC = null){
    global $numeroMagico;
    if ($numC == null || !is_numeric($numC)) {
        $numC = $numeroMagico;
    }
    if ($numA >= $numB && $numA >= $numC ) {
        return $numA;
    }elseif ($numB >= $numA && $numB >= $numC ) {
        return $numB;
    }elseif ($numC >= $numA && $numC >= $numB ) {
        return $numC;
    }
}


function tabla($base, $limit = null){
    $array = [];
    global $numeroMagico;
    if ($limit == null || !is_numeric($limit)) {
        $limit = $numeroMagico;
    }
    for ($i=$base; $i <= $limit ; $i++) {
        $array[] = $i;
    }
    return $array;
}

echo mayor(1,3);
