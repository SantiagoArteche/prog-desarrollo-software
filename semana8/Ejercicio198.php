<?php
$horaSalida = 930 . " PM";
$horaLlegada = 1100 . " AM";
$velocidad = 910 . " KM";
$difHoraria = conversionDifHor("430");
DEFINE('MINUTOS_POR_HORA', 60);

$salida = explode(" ", $horaSalida);
$llegada = explode(" ", $horaLlegada);

$diferenciaHoras =  pasajeTiempo($salida, $llegada) - $difHoraria / MINUTOS_POR_HORA;

echo "<h1>La distancia recorrida por la aeronave es de: " . distancia($velocidad, $diferenciaHoras) . " kms</h1>";

function pasajeTiempo($inicio, $final)
{
    $inicioEnMinutos = pasajeHoraAMinutos($inicio[0], $inicio[1]);
    $finalEnMinutos = pasajeHoraAMinutos($final[0], $final[1]);

    if ($inicio[1] == "PM" && $final[1] == "AM") {
        $minutosParaTerminarElDia = abs($inicioEnMinutos - 24 * MINUTOS_POR_HORA);
        return ($minutosParaTerminarElDia + $finalEnMinutos) / MINUTOS_POR_HORA;
    } else {
        return ($finalEnMinutos - $inicioEnMinutos) / MINUTOS_POR_HORA;
    }
}

function pasajeHoraAMinutos($hora, $momento)
{
    if (strlen($hora) == 3) {
        $horaEnMinutos = $hora[0];
        $minutos = $hora[1] . $hora[2];
    } else {
        $horaEnMinutos = $hora[0] . $hora[1];
        $minutos = $hora[2] . $hora[3];
    }

    if ($momento == "PM") {
        return (($horaEnMinutos * MINUTOS_POR_HORA) + $minutos) + (MINUTOS_POR_HORA * 12);
    } else {
        return ($horaEnMinutos * MINUTOS_POR_HORA) + $minutos;
    }
}

function conversionDifHor($difHor)
{
    if (strlen($difHor) == 3) {
        $horaDif = $difHor[0];
        $minutosDif = $difHor[1] . $difHor[2];
        return ($horaDif * MINUTOS_POR_HORA) + $minutosDif;
    } elseif (strlen($difHor == 2)) {
        $horaDif = $difHor[0] . $difHor[1];
        return $horaDif * MINUTOS_POR_HORA;
    } else {
        return $difHor * MINUTOS_POR_HORA;
    }
}

function distancia($velocidad, $tiempo)
{
    return $velocidad * $tiempo;
}
