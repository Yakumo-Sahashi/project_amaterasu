<?php
	/* if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}else{
        if($_SESSION['user']['rol'] == "3"){
			echo '<script> window.location="alumno" </script>';
		}
    } */
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
                <div class="card-header text-center" style="background: none;">
                    <h1 class="display-4">Panel de Docente</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-4">
                                <a class="mt-3 text-black" href="calificaciones"><b>Calificaciones</b></a>
                                <a href="calificaciones" class="card-body">
                                    <div class="input-group">
                                        <img class="" width="60%" src="img/icon_panel/calificaciones.png" alt="">
                                        <p class="display-4 ml-1">10</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="materiasDocente"><b>Materias</b></a>
                                <a href="materiasDocente" class="card-body">
                                    <div class="input-group">
                                        <img class="" width="60%" src="img/icon_panel/materias.png" alt="">
                                        <p class="display-4 ml-1">9</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="asignacionExamen"><b>Exámenes</b></a>
                                <a href="asignacionExamen" class="card-body">
                                    <div class="input-group">
                                        <img width="60%" src="img/icon_panel/examen.png" alt="" srcset="">
                                        <p class="display-4 ml-1">3</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="semestre"><b>Semestre</b></a>
                                <a href="semestre" class="card-body">
                                    <div class="input-group">
                                        <img class="" width="60%" src="img/icon_panel/semestre.png" alt="">
                                        <p class="display-4 ml-1">12</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="alumnos"><b>Alumnos</b></a>
                                <a href="alumnos" class="card-body">
                                    <div class="input-group">
                                        <img width="60%" src="img/icon_panel/alumno.png" alt="">
                                        <p class="display-4 ml-1">5</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="grafica"><b>Archivos totales</b></a>
                                <a href="grafica" class="card-body">
                                    <div class="input-group">
                                        <img width="60%" src="img/icon_panel/archivos.png" alt="">
                                        <p class="display-4 ml-1">5</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>