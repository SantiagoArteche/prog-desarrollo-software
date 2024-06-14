<?php
$remuneracion = $_POST['remuneracion'];

if(empty($remuneracion)){
    echo "<h1>Inserte un valor en el campo!</h1>";
    return;
}

echo "<h1>Sueldo de los operarios </h1>";
echo "<h1>Los operarios estan remunerados por $ $remuneracion la hora</h1>";

for($i = 0; $i < 50; $i++){
    $horasTrabajadas = rand(0, 160);
    $sueldo = $remuneracion * $horasTrabajadas;
    $numeroOperario = $i + 1;
    echo "<h2>Sueldo operario $numeroOperario = $$sueldo" . "<br>" . "Horas trabajadas: $horasTrabajadas hs</h2>";
}
?>