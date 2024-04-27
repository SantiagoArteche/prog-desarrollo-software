<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio48</title>
  </head>
  <body>
    <form
      method="POST"
      style="display: flex; flex-direction: column; width: 500px; gap: 10px"
    >
      <h1 style="text-align: center">
        Calcule cuantos minutos faltan para el fin de semana!!
      </h1>
      <label for="dia" style="font-size: 22px"
        >Selecciona un día de la semana</label
      >
      <select name="dia" style="font-size: 22px">
        <option value="1">Lunes</option>
        <option value="2">Martes</option>
        <option value="3">Miercoles</option>
        <option value="4">Jueves</option>
        <option value="5">Viernes</option>
        <option value="6">Sabado</option>
        <option value="7">Domingo</option>
      </select>
      <label for="hora" style="font-size: 22px">Ingrese la hora</label>
      <input type="text" name="hora" style="font-size: 22px" />
      <button type="submit" style="padding: 5px">Enviar</button>
    </form>
  </body>
</html>

<?php

if($_POST){
  if(strlen($_POST['hora']) !== 5 || !strpos($_POST['hora'], ':')){
    echo '<h1>El formato en el que se debe ingresar la hora es [hora:minutos] ej: 13:00</h1>';
    return;
}

$separarString = explode(":", $_POST['hora'], 2);
$hora = $separarString[0];
$minutos = $separarString[1];
$numerosValidos = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

if($hora > 23){
  echo '<h1>Ingresa una hora valida entre 00 y 23!</h1>';
  return;
}

if($minutos > 59){
  echo '<h1>Ingresa un minuto valido entre 00 y 59!</h1>';
  return;
}

for($i = 0; $i < 2; $i++){
  if(!in_array($hora[$i], $numerosValidos) || !in_array($minutos[$i], $numerosValidos) ){
      echo '<h1>Recuerda que solo puedes ingresar numeros enteros positivos!</h1>';
      return;
  }
}

$dia = $_POST['dia'];

if($dia == 6){
    $diasFaltantes = 5;
}elseif($dia == 7){
    $diasFaltantes = 4;
}elseif($dia == 5){
    $diasFaltantes = 6;
}else{
    $diasFaltantes = 5 - $dia - 1;
}

$horasDia = 24;
$minutosFaltantesDiaDeHoy = (($horasDia - 1 - $hora) * 60) + 60 - $minutos;
$minutosDiaLlegada = 900;
$minutosDif =  $minutosFaltantesDiaDeHoy + ($diasFaltantes * 1440) + $minutosDiaLlegada;

if($dia == 5 && $hora < 15){
    $minutosDif = $minutosDiaLlegada - $hora * 60 - $minutos ;
}

if($dia == 5 && $hora == 15 && $minutos == 0){
    echo "<h1>COMENZO EL FIN DE SEMANA </h1>";
}else{
    echo "<h1>TAN SOLO FALTAN: $minutosDif MINUTOS PARA EL FIN DE SEMANA!</h1>";
}
}







?>