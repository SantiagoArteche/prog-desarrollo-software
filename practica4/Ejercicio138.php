<?php
$expAritm = $_POST['expAritm'];
$expresionesAceptadas = '/([+\-\/\=\*])/';
$partes = preg_split($expresionesAceptadas, $expAritm, -1, PREG_SPLIT_DELIM_CAPTURE);
$numeros = [];
$operadores = [];

if($expAritm[-1] != "="){
    echo "<h1>La expresion debe terminar con el operador = para calcular el resultado!</h1>";
    return;
}

if(strpos($expAritm, "=") != strlen($expAritm) - 1){
    echo "<h1>El operador = se debe utilizar unicamente al final de la operacion!</h1>";
    return;
}

if($expAritm[0] == "-"){
    array_unshift($numeros, 0);
}

foreach($partes as $parte){
    if($parte != ''){
        if(!is_numeric($parte) && !preg_match($expresionesAceptadas, $parte)){
            echo "<h1>Estas ingresando caracteres invalidos!</h1>";
            return;
        }
        if(is_numeric($parte)){
            array_push($numeros, $parte);
        }else{
            array_push($operadores, $parte);
        }
    }
}

if(count($numeros) == 0){
    echo "<h1>Ingresa al menos un numero!</h1>";
    return;
}

if(count($numeros) != count($operadores)){
    echo "<h1>Siempre debe haber un numero entre los operadores anteriores al =!</h1>";
    return;
}

for($i = 0; $i < count($numeros); $i++){
    $operador = $operadores[$i];
    $resultado = $numeros[0];
   
    if($operador == "*" || $operador == "/"){
        if($operador == "*"){
            $numeros[$i] *= $numeros[$i + 1];
        }else{
            if($numeros[$i + 1] == 0){
                echo "<h1>Estas tratando de hacer una division por 0 lo cual no es correcto!</h1>";
                return;
            }
            $numeros[$i] /= $numeros[$i + 1];
        }
        array_splice($numeros, $i + 1, 1);
        array_splice($operadores, $i, 1); 

        $i--;
    }
}

for($j = 0; $j < count($numeros); $j++){
    $operador = $operadores[$j];
        if($operador == "+"){
            $resultado += $numeros[$j + 1];
        }

        if($operador == "-"){
            $resultado -= $numeros[$j + 1];
        }
}

echo "<h1>El resultado de su operacion aritematica es de: $resultado </h1>";
?>