<?php
$m = [
    ["apellido"=> "Sanchez",
    "nombre" => "Carlos",
    "saldo" => 52148],
    ["apellido"=> "Aguirre",
    "nombre" => "Silvia",
    "saldo" => 17435],
    ["apellido"=> "Benitez",
    "nombre" => "Mariela",
    "saldo" => 47237]
];

$mayorSaldo = -INF;
$menorSaldo = INF;

foreach($m as $columnas){
    $valoresArray = array_values($columnas);
    $saldo = $valoresArray[2];
    $nombreYApellido = $valoresArray[1] . " " . $valoresArray[0];
    
    if($saldo > $mayorSaldo){
        $mayorSaldo = $saldo;
        $mayorNombreYApellido = $nombreYApellido;
    }

    if($saldo < $menorSaldo){
        $menorSaldo = $saldo;
        $menorNombreYApellido = $nombreYApellido;
    }
    $saldoPromedio += $saldo;
}

$saldoPromedio = round($saldoPromedio / count($m), 2);

echo "<h1>El cliente con mayor saldo es $mayorNombreYApellido y su saldo es de $$mayorSaldo</h1>";
echo "<h1>El cliente con menor saldo es $menorNombreYApellido y su saldo es de $$menorSaldo</h1>";
echo "<h1>El saldo promedio de todos los clientes es de $$saldoPromedio</h1>";
?>