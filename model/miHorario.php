<?php
	require_once '../app/fpdf/fpdf.php';
	require_once 'conector.php';
	session_start();
	
	$conectar = new Conectar();
	$conexion =  $conectar->conexion();

	$conexion = conexion();
	//fecha del dia 
	date_default_timezone_set('America/Mexico_City');
	$fecha = date("d-m-Y");
	$sql = "SELECT n_Control,carrera,nombreAlumno,apellidoPaternoA,apellidoMaternoA FROM t_alumnos WHERE idAlumno = {$_SESSION['user']['datosAlumno']}";
	$consulta = $conexion->prepare($sql);
	$consulta->execute();

	$resultado = $consulta->get_result();
	$resultado = $resultado->fetch_assoc();

	//variables de los datos del estudiante
	$nombre = $resultado['nombreAlumno']." ".$resultado['apellidoPaternoA']." ".$resultado['apellidoMaternoA'];
	$nControl = $resultado['n_Control'];
	$semestre = '8';
	$especialidad = 'SOLUCIONES INTEGRALES EN TECNOLOGIA';
	$creditos = '20';
	$reticula = '234';
	$pe = date("Y");
	$a = 'ENE-JUN';
	//Variables que definen las posiciones del encabezado
	$sepLogoY = 2;
	$itmaLogoY = 6;
	$ti = 12;
	$prof = 'NOMBRE DEL PROFESOR';
	//variable de posicion del horario
	$horarioY = 25;

	class PDF extends FPDF{

	}

// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();//permite añadir pie de pagina
	$pdf->AddPage(); //añade pagina

	
		

	$pdf->SetFont('Arial','B',9);

	$pdf->Image('../img/SEP.png',15,$sepLogoY,40,25,'png');
	$pdf->Image('../img/itma2.png',164,$itmaLogoY,18,17,'png');

	//$pdf->Cell(0,2,'',0,1);
	$pdf->SetY($ti);
	$pdf->SetX(69);
	$pdf->Cell(20,5,utf8_decode('INSTITUTO TECNOLÓGICO DE MILPA ALTA II'),0,1);
	$pdf->SetX(67);
	$pdf->Cell(20,5,'CARGA ACADEMICA AL PERIODO: '.$a.'/'.$pe,0,1);
	
    //inicio llenado de datos del estudiante
	$pdf->SetY($horarioY);
	$pdf->Cell(15,10,'FECHA: ',0,0);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(10,10,$fecha,0,1);

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(40,6,'NUMERO DE CONTROL : ',0,0);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,6,$nControl,0,1);
	
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(20,6,'ALUMNO : ',0,0);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(100,6,$nombre,0,1);

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(20,6,'SEMESTRE : ',0,0);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(50,6,$semestre,0,0);

	$pdf->SetFont('Arial','B',9);
	$pdf->SetX(140);
	$pdf->cell(20,6,'CREDITOS : ',0,);
	$pdf->SetFont('Arial','',9);
	$pdf->cell(10,6,$creditos,0,1);
	
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(28,6,'ESPECIALIDAD : ',0,0);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(100,6,$especialidad,0,0);

	$pdf->SetFont('Arial','B',9);
	$pdf->SetX(140);
	$pdf->Cell(20,6,'RETICULA : ',0,0);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(30,6,$reticula,0,1);
	//fin del llenado de datos del estudiante



	$pdf->SetFont('Arial','B',6);
	$pdf->SetX(10);
	$pdf->Cell(20,6,'MATERIA',0,0);
	$pdf->Cell(15,6,'CLAVE',0,0,'C');
	$pdf->Cell(15,6,'AULA',0,0,'C');
	$pdf->Cell(20,6,'LUNES',0,0,'C');
	$pdf->Cell(20,6,'MARTES',0,0,'C');
	$pdf->Cell(20,6,'MIERCOLES',0,0,'C');
	$pdf->Cell(20,6,'JUEVES',0,0,'C');
	$pdf->Cell(20,6,'VIERNES',0,1,'C');
	$pdf->Cell(20,0,'__________________________________________________________________________________________________________________________________________________________',0,1);
	$pdf->Cell(20,3,'',0,1);
	foreach ($conexion->query("SELECT th.aula,th.lunes,th.martes,th.miercoles,th.jueves,th.viernes,tm.nombreMateria,td.nombreDocente,td.apellidoPaternoP,td.apellidoMaternoP FROM t_horarioalumno tah INNER JOIN t_alumnos ta ON tah.idAlumno = ta.idAlumno INNER JOIN t_horarios th ON tah.idHorario = th.idHorario INNER JOIN t_materias tm ON th.id_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre INNER JOIN t_docentes td ON th.idDocente = td.idDocentes WHERE tah.idAlumno = {$_SESSION['user']['datosAlumno']} AND ts.estado = 'activo'") as $dato){
		$pdf->SetFont('Arial','B',6);
		$pdf->Cell(50,2,''.$dato['nombreMateria'],0,0);
		$pdf->Cell(15,2,'sss',0,0,'C');
		$pdf->Cell(15,2,''.$dato['aula'],0,0,'C');
		$pdf->Cell(20,2,''.$dato['lunes'],0,0,'C');
		$pdf->Cell(20,2,''.$dato['martes'],0,0,'C');
		$pdf->Cell(20,2,''.$dato['miercoles'],0,0,'C');
		$pdf->Cell(20,2,''.$dato['jueves'],0,0,'C');
		$pdf->Cell(20,2,''.$dato['viernes'],0,1,'C');
		$pdf->SetFont('Arial','',4);
		$pdf->Cell(20,3,$prof,0,1);
	}

	$pdf->Cell(20,10,'',0,1);
	$pdf->SetFont('Arial','B',6);

	$pdf->Cell(90,3,'___________________________________________',0,0,'C');
	$pdf->Cell(100,3,'___________________________________________',0,1,'C');
	$pdf->Cell(90,6,'DIVISION DE ESTUDIOS PROFESIONALES',0,0,'C');
	$pdf->Cell(100,6,$nombre,0,1,'C');

	//actualizacion de valores de posicion
	$sepLogoY=137;
	$itmaLogoY=141;
	$horarioY=163;
	$ti = 146;
	
	$pdf->Output('I', 'HORARIO'); //cierre del documento PDF

	/**
	 * I permite visualizar el archivo en el navegador
	 * D descarga directamente el archivo
	 * F escribe el archivo en el servidor
	 * S devuelve el contenido del PDF como texto
	 */

?>