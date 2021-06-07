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
            <div class="card shadow card-login">
                <div class="card-body text-center">
                    <i class="text-b"><img src="<?=SERVIDOR?>img/usuario1.webp" class="img-fluid rounded-circle border border-dark" alt=""></i>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h3>Admin</h3>
                            <hr>
                            <p class=""><b>Nombre: </b><!-- <?=$_SESSION['user']['email']?> --></p>
                            <p class=""><b>Apellidos: </b></p>
                            <p class=""><b>Área: </b></p>
                        </div>
                        <div class="col py-5">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="card card-materias">
                        <div class="input-group px-4 py-4">
                            <span class="input-group-prepend">
                                <div class="input-group-text bg-transparent border border-dark border-right-0">
                                <i class="fas fa-search"></i>
                                </div>
                            </span>
                            <input class="form-control py-2 border border-dark border-left-0 border" type="search"/>
                            <span class="btn btn-blue-card mx-2 px-4 my-1"><b>Buscar</b></span>
                            <span class="btn btn-blue-card mx-2 px-4 my-1"><b>Añadir</b></span>
                        </div>
                        <div class="px-4 py-4 text-center">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">Materia</th>
                                        <th scope="col">Prof. Asignado</th>
                                        <th scope="col">Carrera</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Editar Horarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quimica</td>
                                        <td>Javier</td>
                                        <td>industrial</td>
                                        <td>5</td>
                                        <td><span class="btn btn-warning btn-sm text-white borde-button"><i class="fas fa-edit"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td>Sis. Web</td>
                                        <td>Enrique</td>
                                        <td>Sistemas</td>
                                        <td>6</td>
                                        <td><span class="btn btn-warning btn-sm text-white borde-button"><i class="fas fa-edit"></i></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center pb-4">
                            <span class="btn btn-blue-card"><b>Volver al Panel de Control</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>