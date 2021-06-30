<?php

    require_once "conector.php";
    class Docentes extends Conectar{
        public function agregarDocente($datos){
            $conexion = Conectar :: conexion();
            $sql = "INSERT INTO t_docentes (rfc,areaProfesor,nombreDocente,apellidoPaternoP,apellidoMaternoP,fechaNacimiento) 
                    VALUES(?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);                               // pedro
            $query->bind_param('sssssd',$datos['rfc'],$datos['carrera'],$datos['nombre'],$datos['apellidoPaterno'],
                                             $datos['apellidoMaterno'],$datos['fechaNacimiento']);                   
            $respuesta =$query->execute();
            $query->close();
            return $respuesta;
        }
        public function agregarCorreo($datos){

        }
        public function actualizarDocentes($datos){
            $conexion = Conectar :: conexion();
            $sql = "UPDATE t_docentes SET rfc = ?, areaProfesor = ?, nombreDocente = ?, apellidoPaternoP = ?, apellidoMaternoP= ?, fechaNacimiento = ?, telefono = ?
                    WHERE idDocentes = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssss',$datos['rfc'],$datos['carrera'],$datos['nombre'],$datos['apellidoPaterno'],
                                             $datos['apellidoMaterno'],$datos['fechaNacimiento'],$datos['telefono'],$datos['idDocente']);
            $respuesta = $query->execute();
            $query->close();
            return$respuesta;
        }
        public function obtenerDocentes($idDocentes){
            $conexion = Conectar :: conexion();
            $sql = "SELECT * FROM t_docentes INNER JOIN t_usuario WHERE idDocentes ='$idDocentes'";
            $resultado =mysqli_query($conexion,$sql);
            $docentes= mysqli_fetch_array($resultado);
            $datos=array(
                "idDocente" =>$docentes['idDocentes'], 
                "rfc" =>$docentes['rfc'],
                "carrera" =>$docentes['areaProfesor'], 
                "nombre" =>$docentes['nombreDocente'],
                "apellidoPaterno" =>$docentes['apellidoPaternoP'],
                "apellidoMaterno" =>$docentes['apellidoMaternoP'],
                "fechaNacimiento" =>$docentes['fechaNacimiento'],
                "telefono" =>$docentes['telefono'],
                "correo" =>$docentes['email']
            );
            return $datos;
        }
        public function eliminarDocentes($datos){
            $conexion = Conectar :: conexion();
            $sql= array(
                "DELETE FROM t_horarios WHERE idDocente =".$datos,
                "DELETE FROM t_docentes WHERE idDocentes =".$datos,
                "DELETE FROM t_usuario WHERE datosDocentes =".$datos
                    );
            for($i=0;$i<3;$i++){
                $respuesta =$conexion->query($sql[$i]);
                
                if(!$respuesta){
                    $respuesta = 2;
                    break;
                }else{
                    $respuesta = 1;
                }
            }
            $conexion->close();
            return $respuesta;
        }
    }
?>