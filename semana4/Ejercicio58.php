<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 58</title>
  </head>
  <body>
    <h1>Obten tu nombre completo sin vocales!</h1>
    <form
      action="Ejercicio58.php"
      method="POST"
      style="display: flex; gap: 3px"
    >
      <label style="font-size: 22px; font-weight: bold"
        >Ingrese su nombre completo:
      </label>
      <input type="text" name="nombreCompleto" style="padding: 5px" />
      <button type="submit" style="width: 100px">Enviar</button>
    </form>
  </body>
</html>

<?php
$nombreCompleto = $_POST["nombreCompleto"];
$asciiVocales = [97, 101, 105, 111, 117];
$asciiZMinuscula = 122;
$rangoAsciiEspeciales1 = [33, 64];
$rangoAsciiEspeciales2 = [91, 96];


if($_POST){
    if(strlen($nombreCompleto) == 0){
        echo "<h1>Completa el campo!!</h1>";
        return;
    }
    
    for ($i = 0; $i < strlen($nombreCompleto); $i++) {
        $caracterMinusAscii = ord(strtolower($nombreCompleto[$i]));
    
        if (is_numeric($nombreCompleto[$i])) {
            echo "<h1>Tu nombre no debe contener números</h1>";
            return;
        }
    
        if (($caracterMinusAscii >= $rangoAsciiEspeciales1[0] && $caracterMinusAscii <= $rangoAsciiEspeciales1[1]) || 
        ($caracterMinusAscii >= $rangoAsciiEspeciales2[0] && $caracterMinusAscii <= $rangoAsciiEspeciales2[1])) {
            echo "<h1>Tu nombre no debe contener caracteres especiales</h1>";
            return;
        }
    
        if (!in_array($caracterMinusAscii, $asciiVocales) && $caracterMinusAscii <= $asciiZMinuscula) {
            $nombreCompletoSinVocales .= $nombreCompleto[$i];
        }
    }
    
    echo "<h2>Tu nombre completo sin vocales es: $nombreCompletoSinVocales</h2>";
}

?>
