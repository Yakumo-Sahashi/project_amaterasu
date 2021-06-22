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
    echo '<script> window.location="'.$direccion.'" </script>';
?>
<!-- <div class="container mt-5">
    <div class="row justify-content-around">
        <div class="col-md-5 py-4">
            <div class="card bg-light">
                <div class="card-body py-5">
                    <a class="btn btn-blue btn-block btn-lg" href="admin">Panel administrador</a>
                    <a class="btn btn-blue btn-block btn-lg" href="docente">Panel docente</a>
                    <a class="btn btn-blue btn-block btn-lg" href="alumno">Panel alumno</a>
                </div>
            </div>
        </div>
    </div>
</div> -->