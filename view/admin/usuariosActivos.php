<?php
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}elseif($_SESSION['user']['rol'] != "2" || $_SESSION['user']['admin'] != "1" ){
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
                    <div class="row card-materias mx-1 my-1">
                        <div class="col-md-12 mt-3 text-center align-self-center">
                                <h2>Listado de usuarios</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="px-4 py-4 text-center">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl" id="tablaUsuarios">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">IdUsuario</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="text-center pb-4">
                                <a href="admin" class="btn btn-blue-card text-white">Volver al Panel de Control</a>
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=SERVIDOR?>controller/funcionesUsuariosActivos.js"></script>
