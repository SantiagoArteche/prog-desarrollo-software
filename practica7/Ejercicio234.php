<?php

class Generador
{

    public $modo;
    public $inicio;
    public $final;
    public $numero;

    public function __construct($modo, $init, $end, $number)
    {
        $this->modo = $modo;
        $this->inicio = $init;
        $this->final = $end;
        $this->numero = $number;
    }

    public function generarNumeros()
    {
        $arrayNumeros = [];

        for ($i = 0; $i < $this->numero; $i++) {
            $numeroRandom = rand(0, 100) . '.' .  rand(1, 9);

            if (intval($numeroRandom) >= 100) {
                $numeroRandom = 100;
            }

            $redondearNumeroRandom = $this->redondeo($numeroRandom);

            array_push($arrayNumeros, [$numeroRandom, $redondearNumeroRandom]);
        }

        return $arrayNumeros;
    }

    public function redondeo($number)
    {
        if ($this->modo == 1) {
            $roundedNumber = ceil($number);
        } elseif ($this->modo == 2) {
            $roundedNumber = floor($number);
        } else {
            $roundedNumber = round($number);
        }

        return $roundedNumber;
    }

    public function respuesta()
    {
        // Respuesta hecha con echo porque sino el foreach me corta las respuestas en el primero numero en vez de mostrar todos los que contiene el array.

        if (!($this->numero >= $this->inicio && $this->numero <= $this->final)) {
            echo 'Numero debe ser mayor o igual que inicio y menor o igual que fin';
            return;
        }

        $numeros = $this->generarNumeros();

        foreach ($numeros as $numero) {
            $sinRedondeo = $numero[0];
            $redondeado = $numero[1];

            if ($this->modo == 1) {
                $modo = 'Al alza';
            } elseif ($this->modo == 2) {
                $modo = 'A la baja';
            } else {
                $modo = 'Normal';
            }

            echo "Numero sin redondear: $sinRedondeo Numero redondeado con modo $modo: $redondeado <br>";
        }
    }
}

$generador = new Generador($_POST['modo'], $_POST['ini'], $_POST['fin'], $_POST['nro']);
$generador->respuesta();
