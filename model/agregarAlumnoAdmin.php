<?php
    require 'conector.php';
	$conectar = new Conectar();
    $conexion =  $conectar->conexion();

    $email = $conexion->real_escape_string(htmlentities($_POST['email']));

    $sql = "SELECT * FROM t_usuario WHERE email = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('s',$email);
    $consulta->execute();

    $resultado = $consulta->get_result();
    $resultado = $resultado->fetch_assoc();

    if (!$resultado) {    
        $semestre = comprobarSemestre($conexion);
        $control = generarNControl();
        $query = "INSERT INTO t_alumnos (n_Control,nombreAlumno,apellidoPaternoA,apellidoMaternoA,carrera,fechaNacimiento,curp,tel,fk_semestre) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param('sssssssss',$control, $_POST['nombre'],$_POST['paterno'],$_POST['materno'],$_POST['carrera'],$_POST['fechaNacimiento'],$_POST['curp'],$_POST['telefono'],$semestre);
     
        if($stmt->execute()){
            $idAlumno = mysqli_insert_id($conexion);
            $password = "temp1234";
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $dt1 = 2;
            $dt2 = 3;
            $dt3 = 0;
            $dt4 = 1;
            
            $query = "INSERT INTO t_usuario (email,password,estado,rol,admin,datosAlumno,datosDocente) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param('ssiiiii',$_POST['email'],$pass,$dt1,$dt2,$dt3,$idAlumno,$dt4);
            if($stmt->execute()){
                echo "2";
            }else{
                echo "".$idAlumno;
            }            
        }else{
            echo "1";
        }
    }else {
        echo "El email ya esta registrado";
    }

    function comprobarSemestre($conexion){
        $sql = "SELECT * FROM t_semestre WHERE estado = 'activo'";
		$consulta = $conexion->prepare($sql);
		$consulta->execute();
  
		$resultado = $consulta->get_result();
		$resultado = $resultado->fetch_assoc();

		return $resultado['idSemestre'];        
	}


    function generarNControl(){
        date_default_timezone_set('America/Mexico_City');
	    $fecha = date("Y");
        $fin = $fecha[2].$fecha[3]; 

		return $fin."1190001";
		
	}



?>