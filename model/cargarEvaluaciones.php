<?php
	require_once '../app/config.php'; 
	require_once 'conector.php';
	$conectar = new Conectar();
	$conexion =  $conectar->conexion();
	session_start();
	$registroErrores = array();
	$tipoArchivo = $_POST['tipo'];
	$carpeta = $_SESSION['user']['datosDocente'];
	$materia = $_POST['materia'];
	$materia =  substr($materia,1);
	$unidad = "unidad_".$_POST['unidad'];
	$tipoEvaluacion = $_POST['evaluacion'];
	$errores = '';


	if($_FILES["archivo"]["name"]){

		if($_FILES["archivo"]["size"] <= 2000*1024){
				
			$filename = $_FILES["archivo"]["name"]; //archivo con su nombre original
			$source = $_FILES["archivo"]["tmp_name"];//archivo con nombre temporal
				
			$directorio = '../files/docente/'.$carpeta;

			$validarTipo = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

			if ($validarTipo == $tipoArchivo) {
                
				if(!file_exists($directorio)){ 
					mkdir($directorio, 0777) or die("No se puede crear el directorio de extraccion".$directorio);
				}
				
				$semestre = comprobarSemestre($conexion);
				carpertaSemestre($semestre,$directorio);
				$directorio = $directorio.'/'.$semestre;
				carpertaMateria($materia,$directorio);
				$directorio = $directorio.'/'.$materia;
				carpetaTipo($tipoEvaluacion,$directorio);
				$directorio = $directorio.'/'.$tipoEvaluacion;
				carpertaUnidad($unidad,$directorio);
				$directorio = $directorio.'/'.$unidad;

				$dir=opendir($directorio);
				$target_path = $directorio.'/'.$filename; 
				$vacio = @scandir($directorio);

				if (!file_exists($target_path)) {
					if (count($vacio) < 3){
						if(move_uploaded_file($source, $target_path)) {
							echo "2";
						} else {	
							echo "1";
						}
						closedir($dir);
					}else{
						echo "Solo puedes subir un archivo de evaluacion.";
					}
				}else{
					echo "El archivo ya existe en el servidor!";
				}
				
			}else{
				echo "El formato de archivo no es valido!";
			}
			
		}else{
			echo "El archivo excede el peso maximo de 2MB!";
		}	
	}else {
		echo "Debes subir un archivo";
	}	

	function carpetaTipo($subcarpeta,$directorio){
		if(!file_exists($directorio.'/'.$subcarpeta)){ //verifica que el directorio no exista 
			mkdir($directorio.'/'.$subcarpeta, 0777) or die("No se puede crear el directorio de extraccion");
		}
	}

	function carpertaMateria($materia,$directorio){
		if(!file_exists($directorio.'/'.$materia)){ //verifica que el directorio no exista 
			mkdir($directorio.'/'.$materia, 0777) or die("No se puede crear el directorio de extraccion");
		}
	}

	function carpertaSemestre($semestre,$directorio){
		if(!file_exists($directorio.'/'.$semestre)){ //verifica que el directorio no exista 
			mkdir($directorio.'/'.$semestre, 0777) or die("No se puede crear el directorio de extraccion");
		}
	}

	function carpertaUnidad($unidad,$directorio){
		if(!file_exists($directorio.'/'.$unidad)){ //verifica que el directorio no exista 
			mkdir($directorio.'/'.$unidad, 0777) or die("No se puede crear el directorio de extraccion");
		}
	}

	function comprobarSemestre($conexion){

		$sql = "SELECT * FROM t_semestre WHERE estado = 'activo'";
		$consulta = $conexion->prepare($sql);
		$consulta->execute();
  
		$resultado = $consulta->get_result();
		$resultado = $resultado->fetch_assoc();

		return $resultado['semestre'];
	}
		
?>