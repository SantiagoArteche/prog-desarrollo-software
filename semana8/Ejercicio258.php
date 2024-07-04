<?php
$int = $_POST['number'];

es_primo($int);

function es_primo($int)
{
    $arrayNumeros = [];

    for ($i = 1; $i <= $int; $i++) {
        array_push($arrayNumeros, $i);
    }

    foreach ($arrayNumeros as $el) {
        if ($el == 1 || $el % 2 == 0 && $el != 2 || $el % 3 == 0 && $el != 3 || $el % 5 == 0 && $el != 5 || $el % 7 == 0 && $el != 7) {
            echo "<h1>$el no es primo</h1>";
        } else {
            echo "<h1>$el es primo</h1>";
        }
    }
}
