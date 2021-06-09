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
        <div class="col-md-3">
            <?php require_once 'datosUsuario.php';?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="row card-materias mx-1 my-1">
                        <div class="col-md-6 mt-3 px-4">
                            <div class="input-group ">
                                <span class="input-group-prepend">
                                    <div class="input-group-text bg-transparent border border-dark border-right-0">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </span>
                                <input class="form-control py-2 border border-dark border-left-0 border" type="search" />
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="btn btn-blue-card btn-block"><b>Buscar</b></span>
                        </div>
                        <div class="col-md-12">
                            <div class="px-4 py-4 text-center">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Área</th>
                                        <th scope="col">RFC</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Camilo</td>
                                        <td>Séptimo</td>
                                        <td>Cálculo</td>
                                        <td>CCP6908</td>
                                        <td><span class="btn btn-success borde-button mr-2"></span>Online</td>
                                    </tr>
                                    <tr>
                                        <td>Alberto</td>
                                        <td>García</td>
                                        <td>Gestión</td>
                                        <td>DFJ6705</td>
                                        <td><span class="btn btn-danger borde-button mr-2"></span>Offline</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center pb-4">
                                <span class="btn btn-blue-card"><b>Volver al Panel de Control</b></span>
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>
