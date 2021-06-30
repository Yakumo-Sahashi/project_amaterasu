<option value="">Materia</option>
<?php 
    require_once 'conector.php';
    $conectar = new Conectar();
    session_start();
	$conexion =  $conectar->conexion();
    $semestre = empty($_POST['semestre']) ? comprobarSemestre($conexion) : $_POST['semestre'];

    if($_SESSION['user']['rol'] == 2){
        $id = $_SESSION['user']['datosDocente'];
        $query = "SELECT * FROM t_horarios th INNER JOIN t_materias tm ON th.id_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre INNER JOIN t_docentes td ON th.idDocente = td.idDocentes WHERE idDocente = '$id' AND ts.semestre = '$semestre'";
    }else{
        $id = $_SESSION['user']['datosAlumno'];
        $query = "SELECT * FROM t_horarioalumno th INNER JOIN t_alumnos ta ON th.idAlumno = ta.idAlumno INNER JOIN t_horarios td ON th.idHorario = td.idHorario INNER JOIN t_materias tm ON td.id_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre  WHERE ta.idAlumno = '$id' AND ts.semestre = '$semestre'";
    }
    foreach ($conexion->query($query) as $data):
?>
    <option value="<?=$data['nombreMateria']?>"><?=$data['nombreMateria']?></option>

<?php 
    endforeach;

    function comprobarSemestre($conexion){

        $sql = "SELECT * FROM t_semestre WHERE estado = 'activo'";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
      
        $resultado = $consulta->get_result();
        $resultado = $resultado->fetch_assoc();
    
        return $resultado['semestre'];
    }
    
?>    