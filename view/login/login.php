<?php
	if (isset($_SESSION['user'])) {
        echo '<script> window.location="home" </script>';
	}
?>
<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col-md-4 py-2">
            <form id="frmLogin" class="form-grup mb-3">
                <div class="card card-login shadow">
                    <div class="card-body">
                        <img src="img/itma2.png" class="mx-auto d-block py-2 mt-2 mb-2" width="70%" alt="">
                        <input type="text" value="1" name="funcion" hidden>
                        <label for="ingreso_mail">Correo electrónico</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text borde-left"><i
                                        class="fas fa-envelope ml-1 text-b"></i></span>
                            </div>
                            <input type="email" class="form-control borde-right" id="email" name="email"
                                placeholder="Ingresa tu email">
                        </div>
                        <label for="password">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text borde-left"><i class="fas fa-lock ml-1 text-b"></i></span>
                            </div>
                            <input type="password" class="form-control borde-right" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <button class="btn btn-blue btn-block" type="button" id="btnSesion">Iniciar Sesion</button>
                        <a href="recuperar" class="btn btn-link btn-block">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>