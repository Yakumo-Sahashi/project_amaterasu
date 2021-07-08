<?php
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}elseif($_SESSION['user']['rol'] != "2"){
		echo '<script> window.location="alumno" </script>';
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
                            <h2>Lista de alumnos</h2>
                        </div>
                        <div class="col-md-4">
                            <a href="docente" class="btn btn-blue"><b>Volver al Panel de Control</b></a>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl" id="tablaAlumnoDocente">
                                <thead class="table-head">
                                    <tr>
                                        <th>Materia</th>
                                        <th>Aula</th>
                                        <th>Carrera</th>
                                        <th>No. Control</th>
                                        <th>Nombre</th>
                                        <th>Ap. Paterno</th>
                                        <th>Ap. Materno</th>                                        
                                    </tr>
                                </thead>
                            </table>
                            <div class="text-center pb-4">
                                
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>controller/funciones_cargar_alumnos_docente.js"></script>