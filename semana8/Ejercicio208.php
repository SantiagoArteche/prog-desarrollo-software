<?php
$palabraA = $_POST['wordA'];
$palabraB = $_POST['wordB'];

evaluarLetras($palabraA, $palabraB);

function evaluarLetras($palabra, $bPalabra)
{
    $arrayLetras = crearArray($palabra);
    $arrayLetrasB = crearArray($bPalabra);
    $n = 0;
    $a = 0;
    $b = 0;

    $verificarA = verificarLetras($a, $palabra, $arrayLetras);
    $verificarB = verificarLetras($b, $bPalabra, $arrayLetrasB);

    foreach ($arrayLetras as $letra) {
        foreach ($arrayLetrasB as $letraB) {
            if ($letra == $letraB) {
                $n++;
            }
        }
    }

    if ($verificarA == 'errorA' || $verificarB == 'errorA') {
        echo "<h1>No se deben ingresar numeros</h1>";
        return;
    } else if ($verificarA == 'errorB' || $verificarB == 'errorB') {
        echo "<h1>No se deben ingresar espacios</h1>";
        return;
    } else if ($verificarA == 'errorC' || $verificarB == 'errorC') {
        echo "<h1>No se deben repetir letras dentro de una misma palabra</h1>";
        return;
    } else {
        if ($n == 1) {
            echo "<h1>Entre la primer y segunda palabra hay " . $n . " letra igual </h1>";
        } else {
            echo "<h1>Entre la primer y segunda palabra hay " . $n . " letras iguales </h1>";
        }
    }
}

function crearArray($palabra)
{
    $arrayLetras = [];

    for ($i = 0; $i < strlen($palabra); $i++) {
        $arrayLetras[$i] = $palabra[$i];
    }

    return $arrayLetras;
}

function verificarLetras($sumar, $palabra, $array)
{
    $error = 'errorA';
    $errorB = 'errorB';
    $errorC = 'errorC';
    for ($k = 0; $k < count($array); $k++) {
        if (is_numeric($palabra[$k])) {
            return $error;
        }
        if ($palabra[$k] == ' ') {
            return $errorB;
        }
        for ($j = 0; $j < count($array); $j++) {
            if ($palabra[$k] == $array[$j]) {
                $sumar++;
            }
        }
    }

    if ($sumar > strlen($palabra)) {
        return $errorC;
    }
}
