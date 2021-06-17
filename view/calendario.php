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
           <?php require_once 'docente/datosUsuario.php';?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="row justify-content-around">
                        <div class="col-md-12">
                            <img class="img-fluid mx-auto d-block" src="img/icon_panel/calendario.png" alt="">
                        </div>

                        <div class="col-md-7 py-5">
                            <a class="btn btn-block btn-blue text-white" href="admin">Volver al panel</a>
                        </div>
                    </div>     
                </div>
            </div>    
        </div>
    </div>
</div>