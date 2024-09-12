<?php
class Conversor
{
    public $valor;
    public $unidad;

    public function __construct($val, $unidad)
    {
        $this->valor = $val;
        $this->unidad = $unidad;
    }

    private function equivalencias()
    {

        $kl = 0;
        $hl = 0;
        $dal = 0;
        $l = 0;
        $dl = 0;
        $cl = 0;
        $ml = 0;

        switch ($this->unidad) {
            case 'kl':
                $kl = $this->valor;
                $hl = $kl / 10;
                $dal = $hl / 10;
                $l = $dal / 10;
                $dl = $l / 10;
                $cl = $dl / 10;
                $ml = $cl / 10;

                return [$kl, $hl, $dal, $l, $dl, $cl, $ml];
            case 'hl':
                $hl = $this->valor;
                $kl = $hl * 10;
                $dal = $hl / 10;
                $l = $dal / 10;
                $dl = $l / 10;
                $cl = $dl / 10;
                $ml = $cl / 10;

                return [$kl, $hl, $dal, $l, $dl, $cl, $ml];
            case 'dal':
                $dal = $this->valor;
                $hl = $dal * 10;
                $kl = $hl * 10;
                $l = $dal / 10;
                $dl = $l / 10;
                $cl = $dl / 10;
                $ml = $cl / 10;

                return [$kl, $hl, $dal, $l, $dl, $cl, $ml];
            case 'l':
                $l = $this->valor;
                $dal = $l * 10;
                $hl = $dal * 10;
                $kl = $hl * 10;
                $dl = $l / 10;
                $cl = $dl / 10;
                $ml = $cl / 10;

                return [$kl, $hl, $dal, $l, $dl, $cl, $ml];
            case 'dl':
                $dl = $this->valor;
                $l = $dl * 10;
                $dal = $l * 10;
                $hl = $dal * 10;
                $kl = $hl * 10;
                $cl = $dl / 10;
                $ml = $cl / 10;

                return [$kl, $hl, $dal, $l, $dl, $cl, $ml];
            case 'cl':
                $cl = $this->valor;
                $dl = $cl * 10;
                $l = $dl * 10;
                $dal = $l * 10;
                $hl = $dal * 10;
                $kl = $hl * 10;
                $ml = $cl / 10;

                return [$kl, $hl, $dal, $l, $dl, $cl, $ml];
            default:
                $ml = $this->valor;
                $cl = $ml * 10;
                $dl = $cl * 10;
                $l = $dl * 10;
                $dal = $l * 10;
                $hl = $dal * 10;
                $kl = $hl * 10;

                return [$kl, $hl, $dal, $l, $dl, $cl, $ml];
        }
    }

    public function respuesta()
    {
        $unidades = $this->equivalencias();

        switch ($this->unidad) {
            case 'kl':
                return "hl: $unidades[1] <br> dal: $unidades[2] <br> l: $unidades[3] <br> dl: $unidades[4] <br> cl: $unidades[5] <br> ml: $unidades[6]";
            case 'hl':
                return "kl: $unidades[0] <br> dal: $unidades[2] <br> l: $unidades[3] <br> dl: $unidades[4] <br> cl: $unidades[5] <br> ml: $unidades[6]";
            case 'dal':
                return "kl: $unidades[0] <br> hl: $unidades[1] <br> l: $unidades[3] <br> dl: $unidades[4] <br> cl: $unidades[5] <br> ml: $unidades[6]";
            case 'l':
                return "kl: $unidades[0] <br> hl: $unidades[1] <br> dal: $unidades[2] <br> dl: $unidades[4] <br> cl: $unidades[5] <br> ml: $unidades[6]";
            case 'dl':
                return "kl: $unidades[0] <br> hl: $unidades[1] <br> dal: $unidades[2] <br> l: $unidades[3] <br> cl: $unidades[5] <br> ml: $unidades[6]";
            case 'cl':
                return "kl: $unidades[0] <br> hl: $unidades[1] <br> dal: $unidades[2] <br> l: $unidades[3] <br> dl: $unidades[4] <br> ml: $unidades[6]";
            default:
                return "kl: $unidades[0] <br> hl: $unidades[1] <br> dal: $unidades[2] <br> l: $unidades[3] <br> dl: $unidades[4] <br> cl: $unidades[5]";
        }
    }
}

$conversor = new Conversor(intval($_POST['valor']), $_POST['unidad']);
echo $conversor->respuesta();
