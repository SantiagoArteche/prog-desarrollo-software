<?php

$palabraA = $_POST['wordA'];
$palabraB = $_POST['wordB'];

for($i = 0; $i < strlen($palabraA) || $i < strlen($palabraB); $i++){
    if(is_numeric($palabraA[$i]) || is_numeric($palabraB[$i])){
        echo "<h1>No se deben ingresar numeros</h1>";
        return;
    }

    if($palabraA[$i] == ' '|| $palabraB[$i] == ' '){
        echo "<h1>No se deben ingresar espacios</h1>";
        return;
    }
}

if(evaluarLetras($palabraA, $palabraB)){
    echo "<h1>Entre la primer y segunda palabra hay " . evaluarLetras($palabraA, $palabraB) . " letra/s iguale/s </h1>";
}

function evaluarLetras($palabra, $bPalabra){
    $arrayLetras = crearArray($palabra);
    $arrayLetrasB = crearArray($bPalabra);
    $n = 0;
    $a = 0;
    $b = 0;

    $verificarA = verificarLetras($a, $palabra, $arrayLetras);
    $verificarB = verificarLetras($b, $bPalabra, $arrayLetrasB);

    if($verificarA || $verificarB){
        echo "<h1>No se deben repetir letras dentro de una misma palabra</h1>";
        return;
    }

    foreach($arrayLetras as $letra){
        foreach($arrayLetrasB as $letraB){
            if($letra == $letraB){
                $n++;
            }
        }
    }

    return $n;
}

function crearArray($palabra){
    $arrayLetras =[];

    for($i = 0; $i < strlen($palabra); $i++){
        $arrayLetras[$i] = $palabra[$i];
    }

    return $arrayLetras;
}

function verificarLetras($sumar, $palabra, $array){
    $error = 0;
    for($k = 0; $k < count($array); $k++){
        for($j = 0 ; $j < count($array); $j++){
            if($palabra[$k] == $array[$j]){
                $sumar++;
            }
        }
    }

    if($sumar > strlen($palabra)){
        $error++;
        return $error;
    }
}
?>