<?php
DEFINE('HOST', 'localhost');
DEFINE('USERNAME', 'root');
DEFINE('PASSWORD', 'santimysql');
DEFINE('DATABASE', 'prog1');

try {
    $db = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE); //Conexion a la base de datos
} catch (\Throwable $th) {
    echo "Error conectando a la base de datos: $th";
}

$crearTabla = "CREATE TABLE IF NOT EXISTS registro(id INT PRIMARY KEY AUTO_INCREMENT,";
$crearTabla .= "operacion VARCHAR(1),";
$crearTabla .= "anio INT(4),";
$crearTabla .= "nombre1 VARCHAR(20),";
$crearTabla .= "nombre2 VARCHAR(20),";
$crearTabla .= "lugar VARCHAR(20));";

try {
    //Creacion de tabla
    $createTableQuery = mysqli_query($db, $crearTabla);
} catch (\Throwable $th) {
    echo 'Error creando la tabla!';
    return;
}

//Insercion de datos
$insertarDatos = "INSERT INTO registro (operacion, anio, nombre1, nombre2, lugar)";
$insertarDatos .= "VALUES('N', 1920, 'Ana', '', ''),";
$insertarDatos .= "('N', 1921, 'Mercedes', '', ''),";
$insertarDatos .= "('N', 1948, 'Juan', '', ''),";
$insertarDatos .= "('N', 1954, 'Pepe', '', ''),";
$insertarDatos .= "('N', 1973, 'Angel', '', ''),";
$insertarDatos .= "('N', 1975, 'Mario', '', ''),";
$insertarDatos .= "('N', 1923, 'Lucia', '', ''),";
$insertarDatos .= "('N', 1956, 'Nuria', '', ''),";
$insertarDatos .= "('N', 1946, 'Marcela', '', ''),";
$insertarDatos .= "('C', 1947, 'Ana', 'Lucas', ''),";
$insertarDatos .= "('C', 1976, 'Lucia', 'Pepe', ''),";
$insertarDatos .= "('C', 1981, 'Nuria', 'Pepe', ''),";
$insertarDatos .= "('C', 1982, 'Marcela', 'Pepe', ''),";
$insertarDatos .= "('M', 2008, 'Juan','' ,'Mendoza'),";
$insertarDatos .= "('M', 1949, 'Mercedes','','Tucuman'),";
$insertarDatos .= "('M', 2001, 'Angel','', 'Rosario'),";
$insertarDatos .= "('A', 2021,'','','');";

$queryRegistros = "SELECT COUNT(*) as registrosTotales FROM registro;";

try {
    $hacerQueryTotalRegistros = mysqli_query($db, $queryRegistros);
    $registrosTotales = mysqli_fetch_assoc($hacerQueryTotalRegistros)['registrosTotales'];

    //Aseguro que solo se inserten los datos una vez
    if ($registrosTotales < 17) {
        $createRegisters = mysqli_query($db, $insertarDatos);
    }
} catch (\Throwable $th) {
    echo 'Error insertando registros en la tabla!';
    return;
}


$todosLosRegistros = "SELECT * FROM registro";
$hacerQueryRegistros =  mysqli_query($db, $todosLosRegistros);


$nacimiento = [];
$fallecimiento = [];
$casado = [];
$registros = [];
$especiales = [];
$arrayNombres = []; // Array creado para verificar que no se ingrese dos veces la misma persona en parte A del ejercicio

while ($fila = mysqli_fetch_assoc($hacerQueryRegistros)) {
    if ($fila['operacion'] == 'N') {
        array_push($nacimiento, [$fila['nombre1'], $fila['anio']]);
        array_push($registros, [$fila['anio'], $fila['operacion']]);
    } else if ($fila['operacion'] == 'M') {
        array_push($fallecimiento, [$fila['nombre1'], $fila['anio']]);
        array_push($registros, [$fila['anio'], $fila['operacion']]);
    } else if ($fila['operacion'] == 'A') {
        $anioActual = $fila['anio'];
    } else {
        array_push($casado, [$fila['nombre1'], $fila['nombre2'], $fila['anio']]);
        array_push($registros, [$fila['anio'], $fila['operacion']]);
    }
}



//Resolucion punto A
echo "<h1>A- Nombre de persona y edad: </h1>";

echo "<h1>Fallecidos: </h1>";
for ($i = 0; $i < count($nacimiento); $i++) {
    for ($j = 0; $j < count($fallecimiento); $j++) {
        if ($nacimiento[$i][0] == $fallecimiento[$j][0]) {
            $nombre = $nacimiento[$i][0];
            $edad = $fallecimiento[$j][1] - $nacimiento[$i][1];

            if ($edad > 100) array_push($especiales, $nombre); // Parte del punto B, aprovecho la oportunidad para hacer la validacion de si hay alguien mayor a 100

            array_push($arrayNombres, $nombre);
            echo "<h1>Nombre $nombre, edad $edad </h1>";
        }
    }
}

echo "<h1>No Fallecidos: </h1>";
foreach ($nacimiento as $fila) {
    $nombres = $fila[0];
    $anioNacimiento = $fila[1];

    if (!in_array($nombres, $arrayNombres)) {
        $nombre = $nombres;
        $edad = $anioActual - $anioNacimiento;

        if ($edad > 100) array_push($especiales, $nombre); // Parte del punto B, aprovecho la oportunidad para hacer la validacion de si hay alguien mayor a 100

        echo "<h1>Nombre $nombre, edad $edad </h1>";
    }
}

//Resolucion punto B
for ($i = 0; $i < count($nacimiento); $i++) {
    $nombre = $nacimiento[$i][0];
    $anioNacimiento = $nacimiento[$i][1];

    $n[$nombre] = 0; // Se crea para contar numero de veces que se caso una persona, es un array que tiene como posicion el nombre de las personas y como valor un 0

    for ($j = 0; $j < count($casado); $j++) {
        $casadoCon = $casado[$j][1];
        $esCasado = $casado[$j][0];
        $cuandoSeCaso = $casado[$j][2];

        // La condicion verifica si esta casado y si la edad de casamiento menos el anio que nacio (Comprobando su edad) es mayor a 50 o menor a 18
        if ($nombre == $esCasado && (($cuandoSeCaso - $anioNacimiento) > 50 || ($cuandoSeCaso - $anioNacimiento) < 18)) {
            array_push($especiales, $nombre);
        }


        // La condicion verifica si la persona esta casada y una vez que esto pasa, 
        //va buscando coincidencias de nombres entre si es nombre1 (se casa) y nombre 2 (casado con)
        //si encuentra el nombre va sumando a la posicion que coincida con el nombre (iniciada en 0) + 1
        // y en caso de llegar a 3 lo pushea al array de personas especiales
        if ($nombre == $casadoCon || $nombre == $esCasado) {
            $n[$nombre]++; // Lugar donde hace la suma segun posicion coincidente con el nombre
            if ($n[$nombre] >= 3) {
                array_push($especiales, $nombre);
            }
        }
    }
}

//Punto B - Especial o no
echo "<h1>B - Personas Especiales: </h1>";
foreach ($especiales as $personaNombre) {
    echo "<h1>$personaNombre es especial</h1>";
}

sort($registros); // Ordena registros de menor a mayor
// Para comprension de estos ejercicios:
// registros[0] = numero de año
// registros[1] = operacion
// C - Años con registros
echo "<h1>C - Años con registros: </h1>";
foreach ($registros as $registro) {
    echo "<h1>$registro[0]</h1>";
}

//D - Años con registros felices
echo "<h1>D - Años felices: </h1>";
foreach ($registros as $registro) {
    if ($registro[1] != 'M') {
        echo "<h1>$registro[0]</h1>";
    }
}

//Punto E - Seguidilla de años
echo "<h1>E - Seguidillas de años: </h1>";
$numerosSeguidos = [];
$numerosSinRepetir = [];

// $registros[0] => años
for ($i = 0; $i < count($registros); $i++) {
    //Validacion para ver si los numeros anteriores y posteriores al actual son el numero actual restando uno y sumando uno ej:
    //actual 1950 si 1950 + 1 = numero de la siguiente iteracion y si 1950 - 1 = numero de la anterior iteracion
    //Si por ejemplo i = 1 1950, i = 0 1949 e i = 2 1951 pushea los 3 numeros (todas las veces que esten las coincidencias)
    if ($registros[$i][0] + 1 == $registros[$i + 1][0] && $registros[$i - 1][0] == $registros[$i][0] - 1) {
        array_push($numerosSeguidos, $registros[$i][0] - 1, $registros[$i][0], $registros[$i][0] + 1);
    } else {
        //Se pushea 'separar' para luego identificar cada vez que se termina una seguidilla de numeros
        array_push($numerosSeguidos, 'separar');
    }
}


//Se borran numeros repetidos
foreach ($numerosSeguidos as $numero) {
    if (!in_array("$numero-", $numerosSinRepetir) || $numero == 'separar') {
        array_push($numerosSinRepetir, "$numero-");
    }
}

// Se pasa el array a string para luego separarlo con el metodo explode.
$pasarArrayAString = '';
foreach ($numerosSinRepetir as $numero) {
    $pasarArrayAString .= $numero;
}

//Se separa el array cada vez que se encuentra la palabra separar
// Este metodo tambien borra todas las veces que este 'separar' en el array
$arraySeparado = explode('separar', $pasarArrayAString);

foreach ($arraySeparado as $conjuntoDeNumeros) {
    //strlen($conjuntoDeNumeros) > 4 ya que hay lineas que tienen - simples y teniendo una seguidilla de anios de por lo menos 3, nos aseguramos que por lo menos 1-2-3
    if (!empty($conjuntoDeNumeros) && strlen($conjuntoDeNumeros) > 4) {
        // Se eliminan guiones del principio y el final del set para que no empiece -2024 o termine 2024- y luego se muestra
        if ($conjuntoDeNumeros[0] == '-') $conjuntoDeNumeros[0] = ' ';
        if ($conjuntoDeNumeros[strlen($conjuntoDeNumeros) - 1] == '-') $conjuntoDeNumeros[strlen($conjuntoDeNumeros) - 1] = ' ';
        echo "<h1>$conjuntoDeNumeros</h1>";
    }
}
