<?php 
    require_once 'conector.php';
	$conectar = new Conectar();
    $conexion =  $conectar->conexion();

    $activo = "activo";
    $semestre = semestre();
    $query = "INSERT INTO t_semestre (semestre,inicioSemestre,finSemestre,estado) VALUES (?,NOW(),?,?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('sss',$semestre,$_POST['fechaFin'],$activo);

    if($stmt->execute()){
        $query2 = "UPDATE t_semestre SET estado ='finalizado' WHERE  estado ='inactivo'";
        $stmt2 = $conexion->query($query2);
        if($stmt2){
            echo "2";
        }else{
            echo "1";
        }
    }else{
        echo "1";
    }

    function semestre(){
        date_default_timezone_set('America/Mexico_City');
	    $fecha = date("Y-m-d");
        $mes = date("m");
        $year = date("Y");
        $nombre = $mes > 6 ? "Ago-Dic ".$year : "Ene-Jun ".$year;
        return $nombre;
    }
?>