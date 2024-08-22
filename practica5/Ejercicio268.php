<?php

$cantidadElementos = 50;
$arrayNumeros = [];

for ($i = 0; count($arrayNumeros) != $cantidadElementos; $i++) {
    $numerosRandom = rand(1, 1000);
    if (!in_array($numerosRandom, $arrayNumeros)) {
        $arrayNumeros[] = $numerosRandom;
    }
}

$valores = calculos($arrayNumeros);
$maxs = $valores[0];
$mins = $valores[1];
$promedio = $valores[2];

resultados($maxs, "mayores");
resultados($mins, "menores");
echo "<h1>El promedio de todos los numeros del array es de: $promedio</h1>";

function calculos($array)
{
    sort($array);

    $maxNums = [$array[count($array) - 2], $array[count($array) - 1]];

    $minNums = [$array[0], $array[1]];

    $promedio = array_sum($array) / count($array);

    return [$maxNums, $minNums, $promedio];
}

function resultados($array, $nombre)
{
    echo "<h1>Los dos $nombre números del array son: ";
    foreach ($array as $valor) {
        echo "$valor ";
    }
    echo "</h1>";
}
