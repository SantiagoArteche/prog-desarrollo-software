<?php
$cantidadNumeros = 15;
$arrayNumeros = [];
$arrayModificado = []; 

for($i = 0; $i < $cantidadNumeros; $i++){
    $numerosAleatorios = rand(1, 1000);
    array_push($arrayNumeros, $numerosAleatorios);
}

for($k = 0; $k < count($arrayNumeros); $k++){
    if($k == count($arrayNumeros) - 1){
        array_unshift($arrayModificado, $arrayNumeros[$k]);
    }else{
        array_push($arrayModificado, $arrayNumeros[$k]);
    }
}

imprimirValores($arrayNumeros, "sin modificar son");
imprimirValores($arrayModificado, "modificado son");

function imprimirValores($array, $mensaje){
    echo "<h1>Los valores del array $mensaje:</h1>";
    foreach($array as $valor){
        echo "<span style='font-size: 22px;'>$valor &nbsp;&nbsp;</span>";
    }
}

?>