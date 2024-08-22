<?php
$numero1 = $_GET["numero1"];
$numero2 = $_GET["numero2"];
$numero3 = $_GET["numero3"];

echo "<h1>El número " . mayor($numero1, $numero2, $numero3) . " es el número más grande</h1>";

function mayor($number, $number2, $number3)
{
    $arrayNumbers = [$number, $number2, $number3];

    return max($arrayNumbers);
}
