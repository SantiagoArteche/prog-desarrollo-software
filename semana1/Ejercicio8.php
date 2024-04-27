<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 8</title>
  </head>
  <body>
    <form
      method="POST"
      style="display: flex; flex-direction: column; width: 500px; gap: 16px"
    >
      <div>
        <label for="Number1" style="font-size: 24px">Number1:</label>
        <input
          type="number"
          name="number"
          value="number"
          style="padding: 5px; font-size: 20px; width: 100px"
        />
      </div>
      <div>
        <label for="Number2" style="font-size: 24px">Number2:</label>
        <input
          type="number"
          name="number2"
          value="numbe2"
          style="padding: 5px; font-size: 20px; width: 100px"
        />
      </div>
      <button type="submit" style="font-size: 24px; width: 300px">
        Enviar
      </button>
    </form>
  </body>
</html>
<?php
if($_POST){
   $number1 = intval($_POST["number"]);
   $number2 = intval($_POST["number2"]);

   $suma = $number1 + $number2;
   $producto = $number1 * $number2;
   
   echo "<pre>";
   echo "<h1>La suma de los numeros es: $suma</h1>";
   echo "</pre>";
   
   echo "<pre>";
   echo "<h1>El producto de los numeros es: $producto</h1>";
   echo "</pre>";
}
?>