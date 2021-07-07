<?php
    require_once "conector.php";

    class MateriasActivas extends Conectar{
        function comprobarSemestre(){
            $conexion = Conectar :: conexion();
            $sql = "SELECT * FROM t_semestre WHERE estado = 'activo'";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $resultado = $resultado->fetch_assoc();
            return $resultado['idSemestre'];
        }
        function actualizarSemestre($materia,$idSemestre){
            $conexion = Conectar :: conexion();
            $semestre = $this->comprobarSemestre();
            if($idSemestre == $semestre){
                $semestre --;
            }
            $sql = "UPDATE t_materias SET m_semestre = ? WHERE idMateria = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param("ss",$semestre,$materia);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }

    $materias = new MateriasActivas();
    echo $materias->actualizarSemestre($_POST['idMaterias'],$_POST['idSemestre']);
?>