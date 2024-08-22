<?php
for ($i = 0; $i < 20; $i++) {
    if ($i == 19) {
        $terminos .= fibonacci($i);
        if (fibonacci($i) % 2 != 0) {
            $terminosImpares .= fibonacci($i);
        }
    } else {
        $terminos .= fibonacci($i) . " - ";
        if (fibonacci($i) % 2 != 0) {
            $terminosImpares .= fibonacci($i) . " - ";
        }
    }
}

for ($i = 19; $i >= 0; $i--) {
    if ($i == 0) {
        $terminosDesc .= fibonacci($i);
    } else {
        $terminosDesc .= fibonacci($i) . " - ";
    }
}
echo "<h1> Los primeros 20 terminos de la sucesion fibonacci son: $terminos </h1>";

echo "<h1> De los primeros 20 terminos de la sucesion fibonacci los impares son: $terminosImpares </h1>";

echo "<h1> Los primeros 20 terminos de la sucesion fibonacci ordenados de manera descendente son: $terminosDesc </h1>";

function fibonacci($n)
{
    if ($n < 0) {
        return "Ingreso invalido, fibonacci no acepta numeros negativos.";
    } elseif ($n == 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    } else {
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
}
