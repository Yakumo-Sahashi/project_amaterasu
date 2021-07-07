<?php
if (!isset($_SESSION['user'])) {
    echo '<script> window.location="login" </script>';
} elseif ($_SESSION['user']['rol'] != "2" || $_SESSION['user']['admin'] != "1") {
    echo '<script> window.location="alumno" </script>';
}
    require_once "model/conector.php";
    $conexion = new Conectar;
    $conexion = $conexion->conexion();
    function comprobarSemestre($conexion){
        $sql = "SELECT * FROM t_semestre WHERE estado = 'activo'";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $resultado = $resultado->fetch_assoc();
        return $resultado['idSemestre'];
    }
    $semestre = comprobarSemestre($conexion);
?>
<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col col-12 d-md-none">
            <?php require_once 'navResponsive.php'; ?>
        </div>
        <div class="col d-none d-md-block col-md-3">
            <?php require 'datosUsuario.php'; ?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="row card-materias mx-1 my-1">
                        <div class="col-md-8 mt-3 text-center align-self-center">
                            <h2>Listado de Materias</h2>
                        </div>
                        <div class="col-md-4 mt-3">
                            <a href="admin" class="btn text-white btn-blue-card mt-2">Volver al Panel de Control</a>
                        </div>
                        <div class="col-md-12">
                            <div class="px-4 py-4 text-center">
                                <table class="table table-body border border-secondary table-hover table-responsive-xl " id="tablaMaterias">
                                    <thead class="table-head">
                                        <tr>
                                            <th scope="col">Materia</th>
                                            <th scope="col">Carrera</th>
                                            <th scope="col">Semestre</th>
                                            <th scope="col">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM t_materias INNER JOIN t_semestre ON  t_semestre.idSemestre = t_materias.m_semestre";
                                            $result = mysqli_query($conexion,$sql);
                                            while ($mostrar = mysqli_fetch_array($result)){
                                                $idMaterias = $mostrar['idMateria'];
                                                $idSemestre = $mostrar['idSemestre'];
                                        ?>
                                        <tr>
                                            <td><?php echo $mostrar['nombreMateria']?></td>
                                            <td><?php echo $mostrar['carrera']?></td>
                                            <td><?php echo $mostrar['semestre']?></td>
                                            <td>
                                                <?php
                                                    if($idSemestre == $semestre){
                                                ?>
                                                    <label class="switch">
                                                        <input type="checkbox" checked="checked" name="estadoMaterias" id="estadoMaterias" onclick="usuariosActivos(<?php echo $idMaterias.','.$idSemestre?>)">
                                                        <span class="slider round"></span>
                                                    </label>
                                                <?php
                                                    }else{
                                                ?>
                                                    <label class="switch">
                                                        <input type="checkbox" name="estadoMaterias" id="estadoMaterias" onclick="usuariosActivos(<?php echo $idMaterias.','.$idSemestre?>)">
                                                        <span class="slider round"></span>
                                                    </label>
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php /*require_once "modalAnadirMaterias.php";*/?>
    <script src="<?= SERVIDOR ?>controller/materiasActivas.js"></script>