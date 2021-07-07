<?php 
    require_once 'conector.php';
    require_once '../app/php_mailer/PHPMailerAutoload.php';
	$conectar = new Conectar();
    $conexion =  $conectar->conexion();

    echo generarNControl($conexion);

    function generarNControl($conexion){
        date_default_timezone_set('America/Mexico_City');
	    $fecha = date("Y");
        $fin = $fecha[2].$fecha[3]; 

        $sql = "SELECT max(n_Control) FROM t_alumnos";
        $con = $conexion->prepare($sql);
        $con->execute();

        $result = $con->get_result();
		$result = $result->fetch_assoc();

        $y = "".$result['max(n_Control)'];

        $c = $y[0].$y[1];
        if($c == $fin){
            $ncontrol = $result['max(n_Control)']+1;
        }else{
            $ncontrol = $fin."1190001";
        }
        

		return $ncontrol;
		
	}


?>