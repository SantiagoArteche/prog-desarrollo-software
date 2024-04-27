<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 18</title>
  </head>
  <body>
    <h1>Ingrese 3 letras para que se ordenen alfabéticamente!</h1>
    <form
      method="POST"
      style="display: flex; flex-direction: column; width: 500px; gap: 10px"
    >
      <label for="letra1" style="font-size: 22px">Letra 1:</label>
      <input type="text" name="letra1" style="padding: 5px" />
      <label for="letra1" style="font-size: 22px">Letra 2:</label>
      <input type="text" name="letra2" style="padding: 5px" />
      <label for="letra1" style="font-size: 22px">Letra 3:</label>
      <input type="text" name="letra3" style="padding: 5px" />
      <button type="submit" style="padding: 5px">Enviar</button>
    </form>
  </body>
</html>

<?php
    $arrayLetras = $_POST;

    $diccionario = ["A", "B", "C", "D", "E", 
        "F", "G", "H", "I", "J", "K", "L", 
        "M", "N", "O", "P", "Q", "R", 
        "S", "T", "U", "V", "W", "X", "Y", "Z"];

    natsort($arrayLetras);
    
    function volverHtml($mensaje, $error = false){
        $error;
        echo $mensaje;
        header('Refresh: 3; Ejercicio18.html');
    }
   
    foreach ($arrayLetras as $letra) {
        if(!in_array($letra, $diccionario)){
            volverHtml('<h1>Recuerda no ingresar minúsculas, números ni caracteres especiales!!</h1>', true);
            return;
        }
        if (strlen($letra) != 1) {
            volverHtml('<h1>Asegurate de rellenar todos los espacios con tan solo 1 letra!!</h1>', true);
            return;
        }
    }

        if(!$error){
            $n = 0;
          
            if($_POST){
                echo "<h1>Acá están las letras ordenadas alfábeticamente!!</h1>";
            }
          
            echo "<div style='display: flex;gap: 15px;'>";
            foreach ($arrayLetras as $letra){
                $n++;
          
                if($n === 3){
                    echo "<h2>$letra</h2>";
                }else{
                    echo "<h2>$letra -</h2>";
                }
            }
            echo "</div>";
        }
?>

