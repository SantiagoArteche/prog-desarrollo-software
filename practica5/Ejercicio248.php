<?php
$arrayTemps = [];
$horas = 24;
$dias = 30;
$meses = 12;
$arrayFecha = [];
$index = 0;

for ($i = 0; $i < 8640; $i++) {
    $arrayTemps[$i] = rand(-20, 45);
}


for ($m = 0; $m < $meses; $m++) {
    for ($d = 0; $d < $dias; $d++) {
        for ($h = 0; $h < $horas; $h++) {
            $arrayFecha[$m][$d][$h] = $arrayTemps[$index];
            $index++;
        }
    }
}

$arrayCalculos = calcular_menor_temperatura($arrayFecha);
$menorTemp = min($arrayCalculos);
$estacion = calcular_estacion($arrayCalculos, $menorTemp);

echo "<h1>";
if ($estacion >= 61 && $estacion <= 151) {
    echo "La temperatura mas baja del año fue de $menorTemp y se produjo en Otoño";
} elseif ($estacion >= 152 && $estacion <= 243) {
    echo "La temperatura mas baja del año fue de $menorTemp y se produjo en Invierno";
} else if ($estacion >= 244 && $estacion <= 330) {
    echo "La temperatura mas baja del año fue de $menorTemp y se produjo en Primavera";
} else {
    echo "La temperatura mas baja del año fue de $menorTemp y se produjo en Verano";
}
echo "</h1>";

function calcular_menor_temperatura($array)
{
    $arrayCalcularMin = [];
    foreach ($array as $meses) {
        foreach ($meses as $dia) {
            foreach ($dia as $temp) {
                array_push($arrayCalcularMin, $temp);
            }
        }
    }
    return $arrayCalcularMin;
}

function calcular_estacion($array, $minTemp)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $minTemp) {
            return $i;
        }
    }
}
