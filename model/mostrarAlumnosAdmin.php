<?php
    require_once 'conector.php';
    
    $conectar = new Conectar();
    $conexion =  $conectar->conexion();

    $query = "SELECT * FROM t_alumnos";

    $resultado = $conexion->query($query);

    while($datos = $resultado->fetch_assoc()){
        if($datos['idAlumno']!=1){
            $datos['btnEditar']='<span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarAlumnoModal" onclick="precargarAlumno('.$datos['idAlumno'].');" title="editar"><i class="fas fa-edit"></i></span>';
            $datos['btnEliminar']='<span class="btn btn-danger btn-sm text-white borde-button"  data-toggle="modal" data-target="#eliminarAlumnoModal"  onclick="eliminarAlumno('.$datos['idAlumno'].');" title="editar"><i class="fas fa-trash"></i></span>';
            $cont_dt['data'][]=$datos;
        }
    }
    echo json_encode($cont_dt, JSON_UNESCAPED_UNICODE);
    $conexion->close();
?>