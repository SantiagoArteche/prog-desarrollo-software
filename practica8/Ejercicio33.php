<?php

class Palindromo
{
	public $palabra;
	public function __construct($pal)
	{
		$this->palabra = $pal;
	}

	public function armarAlReves($pal)
	{
		$palabraArray = str_split($pal);
		$arrayPalabraAlReves = array_reverse($palabraArray);
		$palabraAlReves = join('', $arrayPalabraAlReves);
		return $palabraAlReves;
	}

	public function validarPalindromo($pal)
	{
		//Aplico el strtolower ya que no tengo en cuenta las mayusculas y minusculas de una palabra para ver si es palíndromo o no
		if (strtolower($pal) == strtolower($this->armarAlReves($pal))) {
			return "es palíndromo";
		} else {
			return "no es palíndromo";
		}
	}

	public function mostrarInformacion()
	{
		$palabra = $this->palabra;
		$palabraAlReves = $this->armarAlReves($palabra);
		$esPalindromo = $this->validarPalindromo($palabra);

		echo "La palabra ingresada es $palabra, la palabra al reves es $palabraAlReves y esta $esPalindromo";
	}
}

$palindromo = new Palindromo('rEcOnocEr');
echo $palindromo->mostrarInformacion();
