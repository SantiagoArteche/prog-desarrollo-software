<?php
class Escuela
{
    private function conexion()
    {
        define("SERVIDOR", "escuela");
        define("USUARIO", "alumno");
        define("CONTRASENA", "examen");
        define("BDD", "sistema");

        try {
            $conectar = mysqli_connect(SERVIDOR, USUARIO, CONTRASENA, BDD);
            return $conectar;
        } catch (\Throwable $th) {
            echo "Error en la conexion a la base de datos: $th";
            exit;
        }
    }

    public function borrarMateria($id)
    {
        $bdd = $this->conexion();
        $tabla = "materias";

        if (!$this->verificarExistencia($id, $bdd, $tabla)) {
            $bdd->close();

            return "La materia con el id $id no existe";
        } else {
            $query = "DELETE FROM $tabla WHERE id = $id";
            $bdd->query($query);
            $bdd->close();

            return "Materia con el id $id borrada exitosamente";
        }
    }


    public function verificarExistencia($id, $bdd, $tabla)
    {
        $query = "SELECT * FROM $tabla WHERE id = $id";
        $ejecutarQuery = $bdd->query($query);

        return mysqli_fetch_row($ejecutarQuery);
    }
}

$idAEliminar = intval($_GET['id']);
$escuela = new Escuela;
echo $escuela->borrarMateria($idAEliminar);
