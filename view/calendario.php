<?php
    $direccion ="";
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}else{
        if($_SESSION['user']['rol'] == "1"){
			$direccion = "admin";
		}elseif($_SESSION['user']['rol'] == "2"){
            $direccion = "docente";
        }else{
            $direccion = "alumno";
        }
    }
?>
<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col col-12 d-md-none">
            <?php require ''.$direccion.'/navResponsive.php';?>  
        </div>
        <div class="col d-none d-md-block col-md-3">
            <?php require ''.$direccion.'/datosUsuario.php';?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="row justify-content-around">
                        <div class="col-md-4">
                            <button class="btn btn-blue btn-block"></button>
                        </div>
                        <div class="col-md-12">
                            <img class="img-fluid mx-auto d-block" src="img/icon_panel/calendario.png" alt="">
                        </div>

                        <div class="col-md-7 py-5">
                            <a class="btn btn-block btn-blue text-white" href="<?=$direccion;?>">Volver al panel</a>
                        </div>
                    </div>     
                </div>
            </div>    
        </div>
    </div>
</div>