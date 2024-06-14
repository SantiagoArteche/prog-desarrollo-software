<?php
$numeroFila = $_POST['numeroFila'];
$array = [];

for($filas = 0; $filas < 30; $filas++){
    for($columnas = 0; $columnas < 12; $columnas++){
        $array[$filas][$columnas] = rand(1, 1000);
    }
}

for($i = 0; $i < count($array[$numeroFila]); $i++){
    $numerosDeLaFila .= $array[$numeroFila][$i] . " ";
    $valorTotal += $array[$numeroFila][$i];
}

echo "<h1>Los elementos de la fila son: [$numerosDeLaFila]</h1>";
echo "<h1>La suma total de los elementos de la fila es: $valorTotal</h1>";
?>