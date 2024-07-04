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

# Ejercicio 208.

Realizar un programa HTML en donde se pedirá que ingrese dos palabras. Llamar a
un programa PHP, que recibirá esas palabras por el método POST. El programa
deberá llamar a una función que devuelva la cantidad de letras iguales que hay entre
ambas. Considerar que ninguna de ellas tiene letras repetidas.

# Ejercicio 218.

Realizar un programa PHP que contenga distintas funciones para realizar lo siguiente:

- Deberá generar e informar los primeros 20 términos de la sucesión de
  Fibonacci (tener en cuenta que los dos primeros términos son iguales a 1 y que
  los restantes se obtienen como la suma de los dos anteriores).
- Luego deberá hacer lo mismo, pero ahora no debe imprimir los términos pares.
- Por último, deberá imprimirla pero al revés, es decir, empezando desde el
  mayor número, y recorriéndolo en forma descendente.

# Ejercicio 228.

La fecha de Pascua corresponde al primer Domingo después de la primera luna llena
que sigue al equinoccio de primavera, y se calcula con las siguientes expresiones:
A = año mod 19
B = año mod 4
C = año mod 7
D = (19 _ A + 24) mod 30
E = (2 _ B + 4 _ C + 6 _ D + 5) mod 7
N = (22 + D + E)
En el que N indica el número del día de Marzo (o Abril si N > 31) correspondiente al
Domingo de Pascua. Realizar una función que calcule esa fecha para cualquier año
ingresado por medio de un programa HTML. Si no se ingresó ningún año, la función
deberá tomar el año actual (2024). Además, todos los números que figuran en negrita,
deberán ser constantes previamente definidas.
Deberá imprimir en el script principal de la siguiente manera (suponiendo que se
ingresó el año 2015):
Para el año 2015 la fecha de Pascua es el 5 de Abril del 2015
Nota: Dio 36, por eso, se pasa a Abril.

# Ejercicio 238.

Escribir en HTML un programa que solicite el ingreso de un número (entero y positivo),
y que será pasado con el método POST. Luego deberá llamar a un programa php en
donde por medio de una función imprima el resultado de una sucesión de números
armónicos, los cuales tienen la forma:
1 + 1⁄2 + 1/3 + 1⁄4 + ... + 1/n
Donde n será el número ingresado en el HTML. La salida por pantalla debe hacerse
fuera de la función.

# Ejercicio 248.

Se dispone de un conjunto de 8640 temperaturas horarias de nuestra localidad, que se
tomaron durante los 12 meses del año, considerando que todos los meses tienen 30
días y cada día 24 horas (el conjunto está ordenado por mes, día y hora). Simular la
carga de estos datos en un programa PHP, en un vector de 8640 elementos, con
números al azar entre -20 y 45. Se debe desarrollar una función que determine cuál
fue la menor temperatura, e imprima si esa temperatura se produjo en Verano, Otoño,
Invierno o Primavera (de acuerdo al calendario actual de Argentina).

# Ejercicio 258.

Escribir un programa en HTML que pida un número entero. A continuación, llamar a un
programa PHP que por medio de funciones, muestre cuántos números hay entre 1 y n
que sean primos. Un número primo es aquel que solo es divisible por 1 y por él mismo.
Ejemplo: para n = 8:
1  primo
2  primo
3  primo
4  no primo
5  primo
6  no primo
7  primo
8  no primo
Resultando un total de 5 números primos
