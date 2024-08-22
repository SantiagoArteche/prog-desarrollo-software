<?php
$n = $_POST['numero'];

echo "<h1>" . sucesion_armonica($n) . "</h1>";

function sucesion_armonica($numero)
{
    $sucesion = '';
    for ($i = 1; $i <= $numero; $i++) {
        if ($i == 1) {
            $sucesion .= "1 &nbsp; + &nbsp;";
        } else if ($i == $numero) {
            $sucesion .= "1 / $i";
        } else {
            $sucesion .= "1 / $i &nbsp; + &nbsp;";
        }
    }
    return $sucesion;
}
