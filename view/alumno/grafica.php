<?php
/* 	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}else{
        if($_SESSION['user']['rol'] == "2"){
			echo '<script> window.location="docente" </script>';
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-contorno">
                                <div class="card-body">
                                    <div class="row justify-content-around">
                                        <div class="col-md-4 mt-4 mb-1">
                                            <a href="archivos" class="btn btn-blue btn-block">Mostrar archivos</a>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div id="graficaArchivos"></div>
                                        </div>
                                        <div class="col-md-4 mb-4 mt-3">
                                            <a class="btn btn-blue btn-block" href="alumno">Volver al panel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>controller/grafica.js"></script>