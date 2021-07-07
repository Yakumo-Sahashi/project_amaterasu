<?php
    if (!isset($_SESSION['user'])) {
        echo '<script> window.location="login" </script>';
    } elseif ($_SESSION['user']['rol'] != "2" || $_SESSION['user']['admin'] != "1") {
        echo '<script> window.location="alumno" </script>';
    }
?>
<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col col-12 d-md-none">
            <?php require_once 'navResponsive.php'; ?>
        </div>
        <div class="col d-none d-md-block col-md-3">
            <?php require 'datosUsuario.php'; ?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="row card-materias justify-content-center mt-3">
                        <div class="col-md-7 text-center align-self-center">
                            <h2>Listado de horarios</h2>
                        </div>
                        <div class="col-md-4">
                            <span class="btn btn-blue btn-block" data-toggle="modal"
                                data-target="#anadirMateriaModal">Asignar Horario</span>
                            <a href="admin" class="btn btn-blue btn-block">Volver al Panel de Control</a>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <table class="table table-body border border-secondary table-hover table-responsive-xl"
                                    id="tablaMaterias">
                                    <thead class="table-head">
                                        <tr>
                                            <th scope="col">Materia</th>
                                            <th scope="col">Prof.Asignado</th>
                                            <th scope="col">Carrera</th>
                                            <th scope="col">Semestre</th>
                                            <th>Aula</th>
                                            <th scope="col">Editar Horarios</th>
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
</div>

<?php require_once "modalAddHorario.php";?>

<?php require_once "modalEditarHorario.php";?>

<script src="<?= SERVIDOR ?>controller/funciones_cargar_horarios.js"></script>