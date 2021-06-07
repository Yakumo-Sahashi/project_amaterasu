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
                    <i class="fas fa-user fa-9x text-b"></i>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h3>Administrador</h3>
                            <hr>
                            <p class=""><b>Nombre: </b></p>
                            <p class=""><b>apellidos: </b></p>
                            <p class=""><b>Carrera: </b></p>
                            <p class=""><b>Semestre: </b></p>
                            <p class=""><b>No. control: </b></p>
                        </div>
                        <div class="col py-5">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-header text-center" style="background: none;">
                    <h1 class="display-4">Panel de Administrador</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-4">
                                <a class="mt-3 text-black" href="#"><b>Docentes</b></a>
                                <a href="#" class="card-body">
                                    <div class="input-group">
                                        <img class="" width="50%" src="img/icon_panel/docente.png" alt="">
                                        <p class="display-4 ml-1">10</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="#"><b>Materias</b></a>
                                <a href="#" class="card-body">
                                    <div class="input-group">
                                        <img class="" width="70%" src="img/icon_panel/materias.png" alt="">
                                        <p class="display-4 ml-1">9</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="#"><b>Usuarios Activos</b></a>
                                <a href="#" class="card-body">
                                    <div class="input-group">
                                        <img width="48%" src="img/icon_panel/usuarios.png" alt="" srcset="">
                                        <p class="display-4 ml-1">3</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="#"><b>Semestre</b></a>
                                <a href="#" class="card-body">
                                    <div class="input-group">
                                        <img class="" width="43%" src="img/icon_panel/semestre.png" alt="">
                                        <p class="display-4 ml-1">12</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="#"><b>Alumnos</b></a>
                                <a href="#" class="card-body">
                                    <div class="input-group">
                                        <img width="49%" src="img/icon_panel/alumno.png" alt="">
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