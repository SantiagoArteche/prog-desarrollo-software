<?php
$valor = $_POST['valor'];
$conjuntoA = [];
$conjuntoB = [];
$conjuntoC = [];

for($i = 0; $i < $valor; $i++){
    array_push($conjuntoA, rand(1 , 1000));
    array_push($conjuntoB, rand(1 , 1000));
}

for($k = 0; $k < $valor; $k++){
    if($k % 2 == 0){
        array_push($conjuntoC, $conjuntoA[$k]);
    }else{
        array_push($conjuntoC, $conjuntoB[$k]);
    }
}

imprimirValores($conjuntoA, "Uno");
imprimirValores($conjuntoB, "Dos");
imprimirValores($conjuntoC, "Tres");

function imprimirValores($array, $numeroArray){
    echo "<h1>Valores Conjunto $numeroArray:</h1>";
    foreach($array as $valor){
        echo "<span style='font-size: 22px;'>$valor &nbsp;&nbsp;</span>";
    }
}
?>