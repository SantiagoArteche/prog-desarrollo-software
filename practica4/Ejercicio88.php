<?php
$valor = $_POST['valor'];
$valorFactorial = factorial($valor);

echo "<h1>El factorial de $valor es $valorFactorial</h1>";

function factorial($numero){
if($numero == 0){
    return 1;
}else{
    return $numero * factorial($numero - 1);
}
}
?>