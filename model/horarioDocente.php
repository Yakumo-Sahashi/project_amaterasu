<?php 
	require_once '../app/fpdf/fpdf.php';
	require_once 'conector.php';
	session_start();

	$conectar = new Conectar();
    $conexion =  $conectar->conexion();
  // $server = 'localhost';
	// $ussername = 'root';
	// $password = '';
	// $database = 'tecmilpa_preregistro';

	// try {
	// 	$conexion = new PDO("mysql:host=$server;dbname=$database;",$ussername,$password);
	// } catch (PDOException $e) {
	// 	die('Connected falied: '.$getMessage());		
	// }
   
class PDF extends FPDF{

	function Header(){
 
	    // Logos
	    // Tipo de fuente: Arial bold 12 
	    // Título
	    $this->SetFont('Arial','B',16);//PERMITE DEFINIR EL TIPO DE LETRA EFECTO Y TAMAÑO. ESTE SE APLICA A TODO LO QUE LE SIGA.
	    $this->SetTextColor(0,0,0);//PERMITE ASIGNAR UN COLOR AL TEXTO EN FORMATO RBG, TAMBIEN SE APLICA A TODO LO QUE LE SIGA
	    $this->SetY(20); //posicion en Y 
	    $this->SetX(138); //pisicon en X
	    $this->Cell(30,5,utf8_decode('INSTITUTO TECNOLÓGICO DE MILPA ALTA II'),0,1,'C'); //celda titulo
		$this->SetFont('Arial','B',13);
		$this->SetX(135);
		$this->Cell(30,8,'CARGA ACADEMICA',0,1,'C'); 
	    /*PRIMER VALOR LARGO DE LA CELDA
	      SEGUNDO VALOR ALTO DE LA CELDA
	      FORMARTO DE CODIFICACION PARA PERMITIR ACENTOS ETC.
	      PERMITE ASIGNAR UN BORDE A LA CELDA
	      GENERA UN SALTO DE LINEA
	      PERMITE CENTRAR EL CONTENIDO DE LA CELDA
	    */
	    $this->Ln(10);// Salto de línea
	}

	//FUNCION Pie de página
	function Footer(){
	    // Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    $this->Cell(0,10,utf8_decode('Pagína ').$this->PageNo().'/{nb}',0,0,'C');
	}
}
	
	// Creación del objeto de la clase heredada
    $pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();//permite añadir pie de pagina
    $pdf->AddPage(); //añade pagina

	date_default_timezone_set('America/Mexico_City');
	$fecha = date("d-m-Y");
	$sql = "SELECT rfc,nombreDocente,apellidoPaternoP,apellidoMaternoP FROM t_docentes WHERE idDocentes = {$_SESSION['user']['datosDocente']}";
	$consulta = $conexion->prepare($sql);
	$consulta->execute();

	$resultado = $consulta->get_result();
	$resultado = $resultado->fetch_assoc();

	//variables de los datos del estudiante
	$nombre = $resultado['nombreDocente']." ".$resultado['apellidoPaternoP']." ".$resultado['apellidoMaternoP'];
	$nControl = $resultado['rfc'];
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

	$pdf->SetFont('Arial','B',12);

	$pdf->Image('../img/SEP.png',15,10,40,25,'png');
	$pdf->Image('../img/itma2.png',260,14,18,17,'png');

	
	$pdf->SetY(45);
	$pdf->SetX(16);
	$pdf->Cell(19,10,'FECHA: ',0,0);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(15,10,$fecha,0,1);
	$pdf->SetX(16);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(21,6,'DOCENTE : ',0,0);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(110,6,' '.$nombre,0,1);

	$pdf->SetX(16);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(12,6,'RFC : ',0,0);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(25,6,$nControl,0,1);
	//fin del llenado de datos del estudiante
	$pdf->SetY(75);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(15);
	$pdf->Cell(100,8,'MATERIA',0,0);
	$pdf->Cell(20,8,'AULA',0,0,'C');
	$pdf->Cell(30,8,'LUNES',0,0,'C');
	$pdf->Cell(30,8,'MARTES',0,0,'C');
	$pdf->Cell(30,8,'MIERCOLES',0,0,'C');
	$pdf->Cell(30,8,'JUEVES',0,0,'C');
	$pdf->Cell(30,8,'VIERNES',0,1,'C');
	$pdf->Cell(20,0,'___________________________________________________________________________________________________________________',0,1);
	$pdf->Cell(20,3,'',0,1);
  
	foreach ($conexion->query("SELECT aula,lunes,martes,miercoles,jueves,viernes,tm.nombreMateria FROM t_horarios th INNER JOIN t_materias tm  ON th.id_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre WHERE idDocente = {$_SESSION['user']['datosDocente']} AND ts.estado = 'activo'") as $dato){
		$lunes = $dato['lunes'] == "00:00-00:00" ? "" : $dato['lunes'];
		$martes = $dato['martes'] == "00:00-00:00" ? "" : $dato['martes'];
		$miercoles = $dato['miercoles'] == "00:00-00:00" ? "" : $dato['miercoles'];
		$jueves = $dato['jueves'] == "00:00-00:00" ? "" : $dato['jueves'];
		$viernes = $dato['viernes'] == "00:00-00:00" ? "" : $dato['viernes'];
		$pdf->SetX(15);
		$pdf->SetFont('Arial','B',13);
		$pdf->Cell(100,7,''.utf8_decode($dato['nombreMateria']),0,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(20,7,''.$dato['aula'],0,0,'C');
		$pdf->Cell(30,7,''.$lunes,0,0,'C');
		$pdf->Cell(30,7,''.$martes,0,0,'C');
		$pdf->Cell(30,7,''.$miercoles,0,0,'C');
		$pdf->Cell(30,7,''.$jueves,0,0,'C');
		$pdf->Cell(30,7,''.$viernes,0,1,'C');
		$pdf->SetFont('Arial','',9);
		
	}
	$pdf->SetY(160);
	$pdf->Cell(20,10,'',0,1);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetX(50);
	$pdf->Cell(90,3,'___________________________________________',0,0,'C');
	$pdf->Cell(100,3,'___________________________________________',0,1,'C');
	$pdf->SetX(50);
	$pdf->Cell(90,6,'DIVISION DE ESTUDIOS PROFESIONALES',0,0,'C');
	$pdf->Cell(100,6,$nombre,0,1,'C');
	


	//$pdf->MultiCell(181,5,'');
	$pdf->Ln(10);

	/*$pdf->SetFillColor(1,93,153);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(30,6,'texto prueba',1,0,'C',true);
	$pdf->Cell(30,6,'texto prueba2',1,1,'C',true);*/



	$pdf->Output('I', 'horario.pdf'); //cierre del documento PDF


 ?>