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

//Ejecucion una vez que el formulario fue mandado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $legajo = $_POST['legajo'];
    $codigoMateria = $_POST['cod_mat'];
    $dia = $_POST['day'];
    $mes = $_POST['month'];
    $anio = $_POST['year'];
    $nombreCompleto = $_POST['fullname'];


    //Validaciones
    if (!is_numeric($legajo) || intval($legajo) <= 0) {
        echo "<h1>El legajo debe ser numerico positivo</h1>";
        return;
    }

    if (!is_numeric($codigoMateria)) {
        echo "<h1>El codigo de la materia debe ser numerico</h1>";
        return;
    }
    if (!is_numeric($dia) || intval($dia) > 31 || intval($dia) <= 0) {
        echo "<h1>El dia debe ser numerico, mayor a 0 y menor a 32</h1>";
        return;
    }

    if (!is_numeric($mes) || intval($mes) > 12 || intval($dia) <= 0) {
        echo "<h1>El mes debe ser numerico, mayor a 0 y menor a 12</h1>";
        return;
    }

    if (!is_numeric($anio) || intval($anio) < 0) {
        echo "<h1>El año debe ser numerico y mayor a 0</h1>";
        return;
    }

    //Creacion de la tabla en la bdd en caso de que no exista
    $queryCreacionTabla = "CREATE TABLE IF NOT EXISTS inscripcion(id INT AUTO_INCREMENT,";
    $queryCreacionTabla .= "nro_legajo INT(7),";
    $queryCreacionTabla .= "codigo_de_materia INT(6),";
    $queryCreacionTabla .= "dia_del_examen INT(2),";
    $queryCreacionTabla .= "mes_del_examen INT(2),";
    $queryCreacionTabla .= "anio_del_examen INT(4),";
    $queryCreacionTabla .= "apellido_y_nombre VARCHAR(25),";
    $queryCreacionTabla .= "PRIMARY KEY(id));";


    try {
        $crearTabla = mysqli_query($db, $queryCreacionTabla);
    } catch (\Throwable $th) {
        echo "Error creando la tabla: $th";
        return;
    }

    //Creacion de la query para insercion de datos en la tabla (anteriormente nombrada inscripcion - como indica mi ejercicio)
    $crearRegistro = "INSERT INTO inscripcion (nro_legajo, codigo_de_materia, dia_del_examen, mes_del_examen, anio_del_examen, apellido_y_nombre)"; //Aclaro los campos ya que tiene ID autoincremental 
    $crearRegistro .= "VALUES($legajo,";                                                                                                            // para poder repetir nro legajo
    $crearRegistro .= "$codigoMateria,";
    $crearRegistro .= "$dia,";
    $crearRegistro .= "$mes,";
    $crearRegistro .= "$anio,";
    $crearRegistro .= "'$nombreCompleto');";

    //try/catch para manejo de errores EJ: Registros duplicados
    try {
        $insertarRegistro = mysqli_query($db, $crearRegistro); // Query de insercion de datos.

        //Query para traer los datos creados al html
        $queryAlumnos = "SELECT * FROM inscripcion WHERE nro_legajo = $legajo;";
        $alumnosInscriptos = mysqli_query($db, $queryAlumnos);

        echo '<h1>Registro creado!</h1>';
    } catch (\Throwable $th) {
        echo "<h1>Error creando registro: $th</h1>";
        return;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Registros en BDD</title>
</head>

<body>
    <?php if (!$insertarRegistro) : // Una vez realizada la query se oculta el form  
    ?>
        <form action="Ejercicio222.php" method="POST">
            <label for="">Legajo</label>
            <input type="text" required minlength="7" maxlength="7" name="legajo">
            <label for="">Código de materia</label>
            <input type="text" required minlength="6" maxlength="6" name="cod_mat">
            <label for="">Dia</label>
            <input type="text" required maxlength="2" minlength="2" name="day">
            <label for="">Mes</label>
            <input type="text" required minlength="2" maxlength="2" name="month">
            <label for="">Año</label>
            <input type="text" required minlength="4" maxlength="4" name="year">
            <label for="">Nombre Completo</label>
            <input type="text" required maxlength="25" minlength="5" name="fullname">
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>
    <?php while ($fila = mysqli_fetch_assoc($alumnosInscriptos)) : //Datos del registro creado
    ?>
        <h1>Numero de legajo: <?php echo $fila['nro_legajo']; ?></h1>
        <h1>Código de materia: <?php echo $fila['codigo_de_materia']; ?></h1>
        <h1>Dia del examen: <?php echo $fila['dia_del_examen']; ?></h1>
        <h1>Mes del examen: <?php echo $fila['mes_del_examen']; ?></h1>
        <h1>Año del examen: <?php echo $fila['anio_del_examen']; ?></h1>
        <h1>Nombre completo: <?php echo $fila['apellido_y_nombre']; ?></h1>
    <?php endwhile; ?>
</body>

</html>