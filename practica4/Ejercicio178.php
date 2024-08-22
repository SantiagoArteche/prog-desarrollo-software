<?php
$n = $_POST['numero'];
$matrizCuadrada = [];
$diagonalPrincipal = [];
$diagonalSecundaria = [];
$cuartoPrincipal = [];
$cuartoSecundario = [];
$trianguloSup = [];
$trianguloInf = [];

for($filas = 0; $filas < $n; $filas++){
    for($columnas = 0; $columnas < $n; $columnas++){
        $matrizCuadrada[$filas][$columnas] = rand(1, 100);
    }
}

$elementosMatriz = count($matrizCuadrada);
$cuartoMatriz = $elementosMatriz / 2;

for($i = 0; $i < $elementosMatriz; $i++){
    for($j = 0; $j < $elementosMatriz; $j++){
        array_push($diagonalPrincipal, $matrizCuadrada[$i][$j]);
        $sumaDiagonalPrincipal += $matrizCuadrada[$i][$j];

        //Calculo cuarto principal
        if($n % 2 == 0){
            if($i < $cuartoMatriz && $j < $cuartoMatriz){
                array_push($cuartoPrincipal, $matrizCuadrada[$i][$j]);
                $sumaCuartoPrincipal += $matrizCuadrada[$i][$j];
            }
        }

        $i++;
    }
}

for($k = $elementosMatriz - 1; $k > 0; $k--){
    for($b = 0; $b < $elementosMatriz; $b++){
        array_push($diagonalSecundaria , $matrizCuadrada[$k][$b]);
        $sumaDiagonalSecundaria += $matrizCuadrada[$k][$b];

        //Calculo cuarto secundario
        if($n % 2 == 0){
            if($k > 0 && $b < $cuartoMatriz){
                array_push($cuartoSecundario, $matrizCuadrada[$k][$b]);
                $sumaCuartoSecundario += $matrizCuadrada[$k][$b];
            }
        }

        $k--;
    }
}

//Inicio calculo triangulos 
for($l = 0; $l < $elementosMatriz; $l++){
    for($z = $l; $z < $elementosMatriz; $z++){
        array_push($trianguloSup, $matrizCuadrada[$l][$z]);
        $sumaTrianguloSup += $matrizCuadrada[$l][$z];
    }
    
    for($z = 0; $z <= $l; $z++){
        array_push($trianguloInf, $matrizCuadrada[$l][$z]);
        $sumaTrianguloInf += $matrizCuadrada[$l][$z];
    }
}
//Fin calculo triangulos 

//Resoluciones
if($sumaDiagonalPrincipal > $sumaDiagonalSecundaria){
    sumatoriaMayor($diagonalPrincipal, $sumaDiagonalPrincipal, "de la diagonal primaria");
}else{
    sumatoriaMayor($diagonalSecundaria, $sumaDiagonalSecundaria, "de la diagonal secundaria");
}

if($n % 2 == 0){
    if($sumaCuartoPrincipal > $sumaCuartoSecundario){
        sumatoriaMayor($cuartoPrincipal, $sumaCuartoPrincipal, "del cuarto principal");
    }else{
        sumatoriaMayor($cuartoSecundario, $sumaCuartoSecundario, "del cuarto secundario");
    }
}

if($sumaTrianguloSup > $sumaTrianguloInf){
    sumatoriaMayor($trianguloSup, $sumaTrianguloSup, "del triangulo superior");
}else{
    sumatoriaMayor($trianguloInf, $sumaTrianguloInf, "del triangulo inferior");
}

function sumatoriaMayor($cuartoArray, $sumaCuarto, $tipo){
    echo "<h1>La sumatoria de los elementos de la $tipo es la mayor, dando como total $sumaCuarto</h1>";
    echo "<h2>Sus elementos son: </h2>";
    foreach($cuartoArray as $numero){
        echo "<span style='font-size:22px;'>$numero </span>";
    }
}
?>