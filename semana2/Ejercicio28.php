<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 28</title>
  </head>
  <body>
    <h1>Dada la siguiente formula</h1>

    <div style="display: flex; font-size: 20px">
      <div>Z =</div>
      <div style="position: absolute; top: 60px; left: 45px">
        <div style="position: relative; left: 10px">1</div>
        <div>---- e</div>
        <div>√2π</div>
        <div
          style="position: relative; left: 45px; bottom: 50px; font-size: 13px"
        >
          -w^2/2
        </div>
      </div>
    </div>
    <div style="margin-top: 50px">
      <h2>Ingrese el valor de w</h2>
      <form method="POST" style="width: 500px">
        <label for="w" style="font-size: 22px">W:</label>
        <input type="number" name="wResult" style="padding: 5px" />
        <button type="submit" style="padding: 5px">Enviar</button>
      </form>
    </div>
  </body>
</html>

<?php

if($_POST){
  $w = $_POST['wResult'];
  $formula = ( 1 / ( sqrt(2) * pi() ) ) * exp( pow(-$w, 2) / 2 );
  
  if($formula === INF){
      echo "<h1 style='font-size: 44px;'>El valor de z es: <span style='font-size: 60px;'>∞</span> (Infinito)</h1>";
  }else{
      echo "<h1 style='font-size: 44px;'>El valor de z es: $formula</h1>";
  }
}

?>


