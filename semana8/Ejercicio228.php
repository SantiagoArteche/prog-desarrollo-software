<?php
$anio = $_POST['year'] ? $_POST['year'] : 2024;
DEFINE('FIRST_NUMBER', 19);
DEFINE('SECOND_NUMBER', 4);
DEFINE('THIRD_NUMBER', 7);
DEFINE('FOURTH_NUMBER', 24);
DEFINE('FIFTH_NUMBER', 30);
DEFINE('SIXTH_NUMBER', 2);
DEFINE('SEVENTH_NUMBER', 6);
DEFINE('EIGHTH_NUMBER', 5);
DEFINE('NINETH_NUMBER', 22);

pascuas($anio);

function pascuas($year)
{
    $a = $year % FIRST_NUMBER;
    $b = $year % SECOND_NUMBER;
    $c = $year % THIRD_NUMBER;
    $d = (FIRST_NUMBER * $a + FOURTH_NUMBER) % FIFTH_NUMBER;
    $e = (SIXTH_NUMBER * $b + SECOND_NUMBER * $c + SEVENTH_NUMBER * $d + EIGHTH_NUMBER) % THIRD_NUMBER;
    $n = NINETH_NUMBER + $d + $e;

    if ($n <= 30) {
        echo "<h1>Para el año " . $year . " la fecha de Pascua es el " . $n . " de Marzo de 2015</h1>";
    } else {
        echo "<h1>Para el año " . $year . " la fecha de Pascua es el " . $n - 31 . " de Abril de 2015</h1>";
    }
}
