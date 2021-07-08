<?php
    session_start();

    require_once "conector.php";

    $obj = new Conectar();
    
    $conexion = $obj->conexion();

    $sql = "SELECT nombreMateria,carrera,m_semestre,idMateria,ts.semestre FROM t_materias tm INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre";
    $resultado = $conexion->query($sql);

    $semestre = comprobarSemestre($conexion);

    

    while($datos = $resultado->fetch_assoc()){
        $estado  =  $datos['m_semestre'] == comprobarSemestre($conexion) ? 'checked="checked"' : "";
        $datos['btncheck'] = '<label class="switch">
                                <input type="checkbox" '.$estado.' name="estadoMaterias"
                                    id="estadoMaterias"
                                    onclick="usuariosActivos('.$datos['idMateria'].','.$datos['m_semestre'].')">
                                <span class="slider round"></span>
                            </label>';  
        $cont_dt['data'][]=$datos; 
        
    };
       
    $datosJSON = json_encode($cont_dt, JSON_UNESCAPED_UNICODE);
    
    echo $datosJSON;
    
    function comprobarSemestre($conexion){
        $sql = "SELECT * FROM t_semestre WHERE estado = 'activo'";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $resultado = $resultado->fetch_assoc();
        return $resultado['idSemestre'];
    }

    $conexion->close();

    
?>