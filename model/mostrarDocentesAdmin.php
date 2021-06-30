<?php
    require_once 'conector.php';
    
    $conectar = new Conectar();
    $conexion =  $conectar->conexion();

    $query = "SELECT * FROM t_docentes";

    $resultado = $conexion->query($query);

    while($datos = $resultado->fetch_assoc()){
        if($datos['idDocentes']!=1){
            $datos['btnEditar']='<span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarAlumnoModal" onclick="obtenerDocentes('.$datos['idDocentes'].');" title="editar"><i class="fas fa-edit"></i></span> <span class="btn btn-danger btn-sm text-white borde-button"  data-toggle="modal" data-target="#eliminarAlumnoModal"  onclick="eliminarDocente('.$datos['idDocentes'].');" title="editar"><i class="fas fa-trash"></i></span>';
            $cont_dt['data'][]=$datos;
        }
    }
    echo json_encode($cont_dt, JSON_UNESCAPED_UNICODE);
    $conexion->close();
?>