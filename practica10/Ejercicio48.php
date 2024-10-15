<?php

class Pizza
{
    public $tamano;
    public $tipo;
    public $estado;
    public static $totalPizzas = 0;
    public static $pizzasServidas = 0;
    public static $pizzasEnviadas = 0;

    public function __construct($tamano, $tipo, $estado = "pedida")
    {
        $this->tamano = $tamano;
        $this->tipo = $tipo;
        $this->estado = $estado;

        self::$totalPizzas++;

        if ($estado == "servida") {
            self::$pizzasServidas++;
        } else if ($estado == "enviada") {
            self::$pizzasEnviadas++;
        }
    }

    public function armarPedidos()
    {
        $tipo = $this->tipo;
        $tamano = $this->tamano;
        $estado = $this->estado;

        $respuesta = "pizza $tipo $tamano, pedida";
        if ($estado == "servida") {
            $respuesta .= "<br>" . "esa pizza ya se ha servido";
        } elseif ($estado == "enviada") {
            $respuesta .= "<br>" . "esa pizza ya se ha enviado";
        }

        return $respuesta;
    }

    public function mostrarPedidos()
    {
        $pedidos = "<h1>" . $this->armarPedidos() . "</h1>";

        return $pedidos;
    }

    public static function armarInfo()
    {
        $infoPizzas = "Pedidas: " . self::$totalPizzas . "<br>Servidas:" . self::$pizzasServidas . "<br>Enviadas: " . self::$pizzasEnviadas;

        return $infoPizzas;
    }

    public static function mostrarInfo()
    {
        $informacionPedidos = "<h1>" . self::armarInfo() . "</h1>";

        return $informacionPedidos;
    }
}

$arrayPedidos = [
    new Pizza("mediana", "margarita"),
    new Pizza("mediana", "especial", "enviada"),
    new Pizza("familiar", "especial", "servida"),
    new Pizza("mediana", "cuatro quesos", "servida")
];

foreach ($arrayPedidos as $pedido) {
    echo $pedido->mostrarPedidos();
}

echo Pizza::mostrarInfo();
