<?php
// EJERCICIO REALIZADO SIN CONSIDERAR AL NUMERO 0 DENTRO DE LOS NUMEROS NATURALES
$valor = $_POST['valor'];
$arrayValores = [];
$arrayPares = [];
$cantidadDeValoresAMostrar = 4;

for($i = 0 ; $i < $valor; $i++){
    array_push($arrayValores, $i + 1);
}

for($j = 0; $j < count($arrayValores); $j++){
    $valores = $arrayValores[$j];

    if($valores % 2 == 0){
        array_push($arrayPares, $valores);
    }
}

for($k = 0; $k < $cantidadDeValoresAMostrar; $k++){
    $valoresAMostrar .= "$arrayPares[$k] ";
}

if(strlen($valoresAMostrar > 0)){
    echo "<h1>Los primeros numeros naturales pares son: $valoresAMostrar </h1>";
}else{
    echo "<h1>No existen numeros naturales pares menores o iguales a $valor</h1>";
}
?>


