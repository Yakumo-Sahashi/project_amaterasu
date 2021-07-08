<?php
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}elseif($_SESSION['user']['admin'] != "1" ){
        if($_SESSION['user']['rol'] != "2"){
            echo '<script> window.location="alumno" </script>';
        }else{
            echo '<script> window.location="docente" </script>';
        }
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
                <div class="card-header text-center" style="background: none;">
                    <h1 class="display-4">Panel de Administrador</h1>
                </div>
                <div class="card-body">
                    <div class="row pricing">
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-4">
                                <a class="mt-3 text-black" href="docentes" title="Docentes"><b>Docentes</b></a>
                                <a href="docentes" class="card-body" title="Docentes">
                                    <div class="input-group">
                                        <img class="" width="60%" src="img/icon_panel/docente.png" alt="">
                                        <p class="display-4 ml-1">D</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="materias" title="Materias"><b>Materias</b></a>
                                <a href="materias" class="card-body" title="Materias">
                                    <div class="input-group">
                                        <img class="" width="60%" src="img/icon_panel/materias.png" alt="">
                                        <p class="display-4 ml-1">M</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="usuariosActivos" title="Usuarios activos"><b>Usuarios Activos</b></a>
                                <a href="usuariosActivos" class="card-body" title="Usuarios activos">
                                    <div class="input-group">
                                        <img width="60%" src="img/icon_panel/usuarios.png" alt="" srcset="">
                                        <p class="display-4 ml-1">U</p>
                                    </div>
                                </a>
                            </div>
                        </div>     
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="semestre" title="Semestre"><b>Semestre</b></a>
                                <a href="semestre" class="card-body" title="Semestre">
                                    <div class="input-group">
                                        <img class="" width="60%" src="img/icon_panel/semestre.png" alt="">
                                        <p class="display-4 ml-1">S</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="horarios" title="Horarios"><b>Horarios</b></a>
                                <a href="horarios" class="card-body" title="Horarios">
                                    <div class="input-group">
                                        <img width="60%" src="img/icon_panel/horario.png" alt="">
                                        <p class="display-4 ml-1">H</p>
                                    </div>
                                </a>
                            </div>
                        </div>     
                        <div class="col-md-4">
                            <div class="card text-center shadow card-panel mb-3">
                                <a class="mt-3 text-black" href="registroAlumnos" title="Alumnos"><b>Alumnos</b></a>
                                <a href="registroAlumnos" class="card-body" title="Alumnos">
                                    <div class="input-group">
                                        <img width="60%" src="img/icon_panel/alumno.png" alt="">
                                        <p class="display-4 ml-1">A</p>
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