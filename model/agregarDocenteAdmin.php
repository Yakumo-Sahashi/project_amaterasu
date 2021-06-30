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

        $query = "INSERT INTO t_docentes (rfc,areaProfesor,nombreDocente,apellidoPaternoP,apellidoMaternoP,fechaNacimiento,telefono) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param('sssssss',$_POST['rfc'], $_POST['nombre'],$_POST['paterno'],$_POST['materno'],$_POST['carrera'],$_POST['fechaNacimiento'],$_POST['telefono']);
     
        if($stmt->execute()){
            $idDocente = mysqli_insert_id($conexion);
            $password = "temp1234";
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $dt1 = 2;
            $dt2 = 2;
            $dt3 = 0;
            $dt4 = 1;
            
            $query = "INSERT INTO t_usuario (email,password,estado,rol,admin,datosAlumno,datosDocente) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param('ssiiiii',$_POST['email'],$pass,$dt1,$dt2,$dt3,$dt4,$idDocente);
            if($stmt->execute()){
                echo "2";
            }else{
                echo "".$idDocente;
            }            
        }else{
            echo "1";
        }
    }else {
        echo "El email ya esta registrado";
    }
?>