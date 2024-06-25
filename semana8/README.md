# Ejercicio 188.

Programar la definición de la función Mayor.

<?php
// El script recibe por GET tres números.
$numero1=$_GET["numero1"];
$numero2=$_GET["numero2"];
$numero3=$_GET["numero3"];

echo "El número “ . Mayor($numero1, $numero2, $numero3) . “ es el más grande";
?>

# Ejercicio 198.

Utilizando la relación DISTANCIA = VELOCIDAD \* TIEMPO, escribe una función que
calcule la distancia sobre una velocidad y un tiempo dados. Utiliza esta función para
encontrar la distancia recorrida por una aeronave que sale de Londres, Inglaterra, a las
9:30 p.m. y llega a Bombay, India, a las 11:00 a.m. del siguiente día, suponiendo que
la nave viaja a 910 km/h y que la diferencia de horarios entre Londres y Bombay es de
4.5 horas.
