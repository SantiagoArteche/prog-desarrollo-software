<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio38</title>
  </head>
  <body>
    <h1>Realice conversiones de grados!</h1>
    <form
      method="POST"
      style="display: flex; flex-direction: column; width: 500px; gap: 5px"
    >
      <label style="font-size: 32px">Ingresar tipo de temperatura</label>
      <select name="tipoTemp" style="font-size: 24px">
        <option value="farenheit">Farenheit</option>
        <option value="centigrados">Centigrados</option>
      </select>
      <label style="font-size: 32px">Ingresar grados</label>
      <input type="text" name="grados" style="font-size: 24px" />
      <button type="submit" style="font-size: 24px">Realizar conversión</button>
    </form>
  </body>
</html>

<?php
$tipo = $_POST['tipoTemp'];
$grados = $_POST['grados'];
$opuesto = $tipo === 'farenheit' ? 'CENTIGRADOS' : 'FARENHEIT';
$mayusTipo = strtoupper($tipo);

if($grados){
if(is_numeric($grados)){
    $respuesta = "La conversion de $grados grados $mayusTipo a grados $opuesto  es de: ";

    if($tipo === 'farenheit'){
        $temperatura = $respuesta . round(($grados - 32) * 5/9, 2) . ' C°';
    }else{
        $temperatura = $respuesta .  round(9/5 * $grados + 32, 2) . ' F°';
    }

    echo "<h1 style='padding: 5px;'>$temperatura</h1>";
}else{
    echo '<h1>Estas ingresando mal los grados, recorda que pueden ser únicamente números</h1>';
}
}
?>