<?php
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
                    <div class="row card-materias mt-3 justify-content-center">
                        <div class="col-md-7 align-self-center text-center">
                            <h2>Listado de materias</h2>
                        </div>
                        <div class="col-md-4 ">
                            <button class="btn btn-blue btn-block">Ver Horario</button>
                            <a href="alumno" class="btn btn-blue btn-block"><b>Volver al Panel de Control</b></a>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl"
                                id="tablaMaterias">
                                <thead class="table-head">
                                    <tr>
                                        <th>Nom. Docente</th>
                                        <th>Ap. Docente</th>
                                        <th>Ap. Docente</th>
                                        <th>Materia</th>
                                        <th>Aula</th>
                                        <th>Carrera</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-4 py-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>controller/funciones_mostrar_horario_alumno.js"></script>