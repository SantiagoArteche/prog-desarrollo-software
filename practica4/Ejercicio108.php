<?php
echo "<h1>Numeros ingresados:</h1>" ;

for($i = 0; $i < 200; $i++){
    $numerosRandom = rand(-200, 200);
    $sumaDeLosNumeros += $numerosRandom;
    if($i == 199){
        echo "<span style='font-size:20px;'>$numerosRandom</span>";
    }else{
        echo "<span style='font-size:20px;'>$numerosRandom, </span>";
    }
}

echo "<h1>La suma de los numeros es: $sumaDeLosNumeros</h1>";
?>