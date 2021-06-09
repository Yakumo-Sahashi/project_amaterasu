<?php
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}else{
        if($_SESSION['user']['rol'] == "3"){
			echo '<script> window.location="alumno" </script>';
		}
    }
?>
<div class="container mt-3">
    <div class="row justify-content-around">
        <div class="col-md-12">
            <img class="img-fluid mx-auto d-block" src="img/calendario.png" alt="">
        </div>
    </div>
    <div class="row justify-content-center py-4">
        <div class="col-md-7">
            <a class="btn btn-block btn-blue" href="docente">Volver al panel</a>
        </div>
    </div>
</div>