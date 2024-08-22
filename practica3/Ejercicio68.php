<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 68</title>
  </head>
  <body>
    <h1>
      Descubra cuantas veces se repite una silaba en una tira de caracteres!
    </h1>
    <form
      action="Ejercicio68.php"
      method="POST"
      style="display: flex; gap: 10px; flex-direction: column"
    >
      <label style="font-size: 22px; font-weight: bold"
        >Ingrese los caracteres:
      </label>
      <input type="text" name="tiraCar" style="padding: 5px; width: 300px" />
      <label style="font-size: 22px; font-weight: bold"
        >Ingrese la silaba a buscar:
      </label>
      <input type="text" name="silaba" style="padding: 5px; width: 300px" />
      <button type="submit" style="width: 300px; padding: 5px">Enviar</button>
    </form>
  </body>
</html>

<?php
$caracteres = $_POST["tiraCar"];
$silaba = $_POST["silaba"];
$vocalesExpReg = '/[aeiouáéíóúü]/';
$caracteresEspecialesExpReg = '/[^\w\s]/';
$n = 0;


if($_POST){

  if(strlen($silaba) != 2 || is_numeric($silaba)){
      echo "<h1>Una silaba esta compuesta de dos letras, ingrese nuevamente!</h1>";
      return;
  }
  
  if(preg_match($caracteresEspecialesExpReg, $silaba)){
      echo "<h1>Una silaba no contiene caracteres especiales!</h1>";
      return;
  }
  
  if(!preg_match($vocalesExpReg, strtolower($silaba))){
      echo "<h1>Una silaba contiene al menos una vocal!</h1>";
      return;
  }
  
  for($i = 0; $i < strlen($caracteres); $i++){
      $silabaEnCaracteres = $caracteres[$i] . $caracteres[$i + 1];
  
      if($silabaEnCaracteres == $silaba){
          $n++;
      }
  }

  echo "<h1>La silaba $silaba se repite $n veces en la tira de caracteres: $caracteres </h1>";
}
?>