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
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-7 align-self-center text-center">
                            <h2>Calendario Académico</h2>                            
                        </div>
                        <div class="col-md-4">
                            <button <?=$estado = $_SESSION['user']['admin'] == "1" ? :"hidden";?> class="btn btn-blue btn-block" type="button" id="btnSemestre" data-toggle="modal" data-target="#modalSemestre">Semestre</button>
                            <a class="btn btn-blue btn-block text-white" href="<?=$direccion;?>">Volver al panel</a>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <img loading="lazy" class="img-fluid mx-auto d-block" src="img/icon_panel/calendario.jpg" alt="">
                        </div>

                        <div class="col-md-7 py-4">
                            
                        </div>
                    </div>     
                </div>
            </div>    
        </div>
    </div>
</div>
<?php 
	date_default_timezone_set('America/Mexico_City');
	$fecha = date("Y-m-d");
?>
<div class="modal fade" id="modalSemestre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header ">
				<h3 class="modal-title mx-auto d-block" id="exampleModalLabel">Informacion de Semestre</h3>
				<button class="close" data-dismiss="modal" aria-label="Cerrar" >
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form id="frmSemestre">
					<div class="row mb-2 justify-content-around">
						<div class="col-md-12 text-center mb-2">
							<h4 id="nombreSemestre"></h4>
						</div>
						<div class="col-md-6 text-center">
							<label for="inicio">Fecha actual inicio</label>
							<div class="input-group mb-1">
								<input class="input form-control" type="text" value="" id="inicioSemestre" readonly>
							</div>
						</div>
						<div class="col-md-6 text-center">
							<label for="fin">Fecha actual Fin</label>
							<div class="input-group mb-1">
								<input class="input form-control" value="" id="finSemestre" readonly>	
							</div>
						</div>
						<div class="col-md-12 text-center mb-3">
							<hr>
                            <h4 id="lt">Habilitar semestre</h4>
						</div>
						<div class="col-md-6" id="proximoSemestre">
							<label for="fecha_fin">Fecha fin</label>
							<div class="input-group mb-1">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
								</div>
								<input type="date" class="input fecha-input form-control" id="fechaFin" name="fechaFin" value="" min="<?=$fecha;?>" max="">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer  justify-content-center">
                <button type="button" class="btn btn-blue-card" data-dismiss="modal" id="btnActualizar">Habilitar</button>
                <button type="button" class="btn btn-red-card" data-dismiss="modal" id="btnCancelar">Cancelar</button>
            </div>
		</div>
	</div>					
</div>
<script src="<?=SERVIDOR?>controller/funciones_semestre_admin.js"></script>