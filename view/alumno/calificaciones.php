<?php
    require_once 'model/conector.php';
    $conectar = new Conectar();
	$conexion =  $conectar->conexion();
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}elseif($_SESSION['user']['rol'] != "3"){
		echo '<script> window.location="docente" </script>';
    }
?>
<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col col-12 d-md-none">
            <?php require_once 'navResponsive.php';?>
        </div>
        <div class="col d-none d-md-block col-md-3">
            <?php require 'datosUsuario.php';?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="row card-materias justify-content-center mt-3">
                        <div class="col-md-7 text-center align-self-center">
                            <h3>Consulta de calificaciones</h3>
                        </div>
                        <div class="col-md-4">
                            <a href="alumno" class="btn btn-blue btn-block"><b>Volver al Panel de Control</b></a>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-archivo">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="accordion">
                                            <?php $cont = 1; foreach ($conexion->query("SELECT idMateria,nombreMateria,unidades,td.idDocentes FROM t_horarioalumno tah INNER JOIN t_alumnos ta ON tah.idAlumno = ta.idAlumno INNER JOIN t_horarios th ON tah.idHorario = th.idHorario INNER JOIN t_materias tm ON th.id_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre INNER JOIN t_docentes td ON th.idDocente = td.idDocentes WHERE tah.idAlumno = {$_SESSION['user']['datosAlumno']} AND ts.estado = 'activo'") as $dt):?>
                                                <div class="card">
                                                    <div class="card-header" id="heading<?=$cont?>">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?=$cont?>" aria-expanded="true" aria-controls="collapse<?=$cont?>" onclick="mostrarDatos('evaluacion','<?=$dt['unidades']?><?=$dt['nombreMateria']?>',<?=$cont?>,'<?=$dt['idDocentes']?>')">
                                                                <?=$dt['nombreMateria']?>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse<?=$cont?>" class="collapse" arial-labelledby="heading<?=$cont?>" data-parent="#accordion">
                                                        <div class="card-body" id="archivos<?=$cont?>">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $cont++; endforeach?>
                                                <?php $conexion->close();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var idTemp = "1";
    function mostrarDatos(tipo,materia,id,idDocentes) {
        console.log(materia);
        //loader.opening();
        idTemp = ""+id;
        $.ajax({
            type: 'post',
            data: 'tipo=' + tipo + '&materia=' + materia + '&idDocentes='+idDocentes,
            url: "model/mostrarArchivosEvaluacionD.php",
            success: (r) => {
            $('#archivos'+id).html(r);
                //loader.ending();
            }
        });
    }
</script>