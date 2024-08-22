<?php 
echo "<h1>Importes de las 200 ventas:</h1>" ;
$ventasMenoresACien = 0;
$MontoTotalMayorIgualACien = 0;

for($i = 0; $i < 200; $i++){
    $numerosRandom = rand(1, 1000);
    
    if($i == 199){
        echo "<span style='font-size:20px;'>$$numerosRandom</span>";
    }else{
        echo "<span style='font-size:20px;'>$$numerosRandom, </span>";
    }

    if($numerosRandom < 100){
        $ventasMenoresACien++;
    }

    if($numerosRandom >= 100){
        $MontoTotalMayorIgualACien += $numerosRandom;
    }
}

echo "<h1>Las cantidad de ventas menores que $ 100 es igual a: $ventasMenoresACien</h1>";
echo "<h1>El importe total de las ventas cuyo importe fue igual o mayor que $ 100 es: $ $MontoTotalMayorIgualACien</h1>";
?>