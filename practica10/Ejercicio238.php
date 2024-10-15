<?php

class Numeracion
{
    public $numero;
    public $base;

    public function __construct($numero, $base)
    {
        $this->numero = $numero;
        $this->base = $base;
    }

    public function validar()
    {
        $base = $this->base;
        $numero = $this->numero;

        if ($base  != "HEX" &&  !is_numeric($numero)) {
            return "Al menos que la base sea HEXADECIMAL, no se permiten ingresar letras!";
        }

        if ($numero < 0) {
            return "El numero debe ser mayor o igual a 0!";
        }
    }

    public function conversor()
    {
        $base = $this->base;
        switch ($base) {
            case "DEC":
                return $this->desdeBaseAOtraBase(10, [2, 8, 16]);
            case "BIN":
                return $this->desdeBaseAOtraBase(2, [8, 10, 16]);
            case "OCT":
                return $this->desdeBaseAOtraBase(8, [2, 10, 16]);
            default:
                return $this->desdeBaseAOtraBase(16, [2, 8, 10]);
        }
    }

    public function desdeBaseAOtraBase($desdeBase, $haciaBasesArray)
    {
        $numero = $this->numero;
        $resultados = [];
        foreach ($haciaBasesArray as $haciaBase) {
            $conversion = base_convert($numero, $desdeBase, $haciaBase);
            $resultados[] = $conversion;
        }
        return $resultados;
    }

    public function armarRespuesta()
    {
        $base = $this->base;
        switch ($base) {
            case "DEC":
                return $this->elaborarString("DECIMAL", ["BINARIO", "OCTAL", "HEXADECIMAL"]);
            case "BIN":
                return $this->elaborarString("BINARIO", ["OCTAL", "DECIMAL", "HEXADECIMAL"]);
            case "OCT":
                return $this->elaborarString("OCTAL", ["BINARIO", "DECIMAL", "HEXADECIMAL"]);
            default:
                return $this->elaborarString("HEXADECIMAL", ["BINARIO", "OCTAL", "DECIMAL"]);
        }
    }

    public function elaborarString($baseString, $otrasBases)
    {
        $demasBases = $this->conversor();
        $validacion = $this->validar();
        $resultado = "";

        if (!$validacion) {
            $resultado = "El numero $this->numero en base $baseString" . "<br>" .
                "convertido a $otrasBases[0]: $demasBases[0]" . "<br>" .
                "convertido a $otrasBases[1]: $demasBases[1]" . "<br>" .
                "convertido a $otrasBases[2]: $demasBases[2]";
        } else {
            $resultado = $validacion;
        }

        return $resultado;
    }

    public function mostrarResultado()
    {
        $resultado = $this->armarRespuesta();
        return $resultado;
    }
}

$sistema = $_POST['sistemaDeNumeracion'];
$numero = $_POST['numero'];

$numeracion = new Numeracion($numero, $sistema);
echo $numeracion->mostrarResultado();
