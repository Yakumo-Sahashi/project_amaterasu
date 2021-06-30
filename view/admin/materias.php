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
                    <div class="row card-materias mx-1 my-1">
                        <div class="col-md-8 mt-3 text-center align-self-center">
                            <h2>Listado de materias</h2>
                        </div>
                        <div class="col-md-4 mt-3">
                            <span class="btn btn-blue-card btn-block" data-toggle="modal" data-target="#anadirMateriaModal">Asignar Horario</span>
                            <a href="admin" class="btn text-white btn-blue-card mt-2">Volver al Panel de Control</a>
                        </div>
                        <div class="col-md-12">
                            <div class="px-4 py-4 text-center">
                                <table class="table table-body border border-secondary table-hover table-responsive-xl" id="tablaMaterias">
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

    <?php require_once "modalAnadirMaterias.php";?>

    <!-- Modal Editar-->
    <div class="modal fade" id="editarMateriaModal" tabindex="-1" aria-labelledby="editarMateriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel"><b>Editar Horario</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                    <form action="" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5><b>Elige la carrera</b></h5>
                                    <select name="" id="selectCarreraEditar" class="form-control" disabled>
                                        <option value="">Selecciona una carrera</option>
                                        <option value="Gestion">Gestión</option>
                                        <option value="Industrial">Industrial</option>
                                        <option value="Sistemas">Sistemas</option>
                                    </select>
                                    <h5 class="py-3"><b>Elige la materia</b></h5>
                                    <select name="" id="selectMateriaEditar" class="form-control" disabled>
                                        <option value="">Selecciona una materia</option>
                                    </select>
                                    <h5 class="py-3"><b>Elige el semestre</b></h5>
                                    <select name="" id="selectSemestreEditar" class="form-control">
                                        <option value="">Selecciona un semestre</option>
                                    </select>
                                    <h5 class="py-3"><b>Elige el docente</b></h5>
                                    <select name="" id="selectDocenteEditar" class="form-control">
                                        <option value="">Selecciona el docente</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <h5><b>Horarios</b></h5>
                                    <label for="lunes">Lunes</label>
                                    <input type="text" placeholder="--:--" class="form-control form-control-sm" name="lunes" id="lunes">
                                    <label for="martes">Martes</label>
                                    <input type="text" placeholder="--:--" class="form-control form-control-sm" name="martes" id="martes">
                                    <label for="miercoles">Miercoles</label>
                                    <input type="text" placeholder="--:--" class="form-control form-control-sm" name="miercoles" id="miercoles">
                                    <label for="jueves">Jueves</label>
                                    <input type="text" placeholder="--:--" class="form-control form-control-sm" name="jueves" id="jueves">
                                    <label for="viernes">Viernes</label>
                                    <input type="text" placeholder="--:--" class="form-control form-control-sm" name="viernes" id="viernes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-blue-card" id="btnEditarMateria"><b>Editar</b></button>
                    <button type="button" class="btn btn-red-card" data-dismiss="modal"><b>Cancelar</b></button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= SERVIDOR ?>controller/funcionesMaterias.js"></script>