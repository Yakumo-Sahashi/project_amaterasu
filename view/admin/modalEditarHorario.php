<!-- Modal editar-->
<div class="modal fade" id="editarMateriaModal" tabindex="-1" aria-labelledby="editarMateriaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel"><b>Editar Horario</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" method="post" id="frmEditarHorario">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5><b>Carrera</b></h5>
                                    <select name="" id="selectCarreraEditar" class="form-control" disabled>
                                        
                                    </select>
                                    <h5 class="py-3"><b>Materia</b></h5>
                                    <select name="id_materia" id="selectMateriaEditar" class="form-control" disabled>

                                    </select>
                                    <h5 class="py-3"><b>Semestre</b></h5>
                                    <select name="" id="selectSemestreEditar" class="form-control" disabled>
                                        
                                    </select>
                                    <h5 class="py-3"><b>Docente</b></h5>
                                    <select name="idDocente" id="selectDocenteEditar" class="form-control">
                                        <option value="">Selecciona el docente</option>
                                    </select>
                                    <h5 class="py-3"><b>Aula</b></h5>
                                    <select name="aula" id="selectAulaEditar" class="form-control">
                                        <option value="">Selecciona el aula</option>
                                        <option value="A1">A1</option>
                                        <option value="A2">A2</option>
                                        <option value="A3">A3</option>
                                        <option value="A4">A4</option>
                                        <option value="B1">B1</option>
                                        <option value="B2">B2</option>
                                        <option value="B3">B3</option>
                                        <option value="B4">B4</option>
                                        <option value="C1">C1</option>
                                        <option value="C2">C2</option>
                                        <option value="C3">C3</option>
                                        <option value="C4">C4</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                    </select>
                                </div>
                                <div class="col-md-9 text-center">
                                    <h5><b>Horarios</b></h5>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <p class="pt-5 pb-2">Lunes</p>
                                                <p class="py-3">Martes</p>
                                                <p class="pt-2 pb-3">Miercoles</p>
                                                <p class="py-2">Jueves</p>
                                                <p class="pt-3">Viernes</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>Horario Actual</p>
                                                <div class="input-group">
                                                    <input type="text" id="lunesActual" name="lunesActual" class="form-control" value="" disabled>
                                                    <span class="btn btn-sm text-danger" title="Eiminar dia" id="btnEliminarLunes"><i class="fas fa-times"></i></span>
                                                </div>
                                                <div class="input-group my-4">
                                                    <input type="text" id="martesActual" name="martesActual" class="form-control" value="" disabled>
                                                    <span class="btn btn-sm text-danger" title="Eiminar dia" id="btnEliminarMartes"><i class="fas fa-times"></i></span>
                                                </div>
                                                <div class="input-group my-4">
                                                    <input type="text" id="miercolesActual" name="miercolesActual" class="form-control" value="" disabled>
                                                    <span class="btn btn-sm text-danger" title="Eiminar dia" id="btnEliminarMiercoles"><i class="fas fa-times"></i></span>
                                                </div>
                                                <div class="input-group my-4">
                                                    <input type="text" id="juevesActual" name="juevesActual" class="form-control" value="" disabled>
                                                    <span class="btn btn-sm text-danger" title="Eiminar dia" id="btnEliminarJueves"><i class="fas fa-times"></i></span>
                                                </div>
                                                <div class="input-group my-4">
                                                    <input type="text" id="viernesActual" name="viernesActual" class="form-control" value="" disabled>
                                                    <span class="btn btn-sm text-danger" title="Eiminar dia" id="btnEliminarViernes"><i class="fas fa-times"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <p>Hora Inicio</p>
                                                <select name="lunesInicioEditar" id="lunesInicioEditar" class="form-control">
                                                    <option value="">00:00</option>
                                                    <option value="7">07:00</option>
                                                    <option value="8">08:00</option>
                                                    <option value="9">09:00</option>
                                                    <option value="10">10:00</option>
                                                    <option value="11">11:00</option>
                                                    <option value="12">12:00</option>
                                                    <option value="13">13:00</option>
                                                    <option value="14">14:00</option>
                                                    <option value="15">15:00</option>
                                                    <option value="16">16:00</option>
                                                    <option value="17">17:00</option>
                                                    <option value="18">18:00</option>
                                                </select>
                                                <select name="martesInicioEditar" id="martesInicioEditar" class="form-control my-4">
                                                    <option value="">00:00</option>
                                                    <option value="7">07:00</option>
                                                    <option value="8">08:00</option>
                                                    <option value="9">09:00</option>
                                                    <option value="10">10:00</option>
                                                    <option value="11">11:00</option>
                                                    <option value="12">12:00</option>
                                                    <option value="13">13:00</option>
                                                    <option value="14">14:00</option>
                                                    <option value="15">15:00</option>
                                                    <option value="16">16:00</option>
                                                    <option value="17">17:00</option>
                                                    <option value="18">18:00</option>
                                                </select>
                                                <select name="miercolesInicioEditar" id="miercolesInicioEditar" class="form-control my-4">
                                                    <option value="">00:00</option>
                                                    <option value="7">07:00</option>
                                                    <option value="8">08:00</option>
                                                    <option value="9">09:00</option>
                                                    <option value="10">10:00</option>
                                                    <option value="11">11:00</option>
                                                    <option value="12">12:00</option>
                                                    <option value="13">13:00</option>
                                                    <option value="14">14:00</option>
                                                    <option value="15">15:00</option>
                                                    <option value="16">16:00</option>
                                                    <option value="17">17:00</option>
                                                    <option value="18">18:00</option>
                                                </select>
                                                <select name="juevesInicioEditar" id="juevesInicioEditar" class="form-control my-4">
                                                    <option value="">00:00</option>
                                                    <option value="7">07:00</option>
                                                    <option value="8">08:00</option>
                                                    <option value="9">09:00</option>
                                                    <option value="10">10:00</option>
                                                    <option value="11">11:00</option>
                                                    <option value="12">12:00</option>
                                                    <option value="13">13:00</option>
                                                    <option value="14">14:00</option>
                                                    <option value="15">15:00</option>
                                                    <option value="16">16:00</option>
                                                    <option value="17">17:00</option>
                                                    <option value="18">18:00</option>
                                                </select>
                                                <select name="viernesInicioEditar" id="viernesInicioEditar" class="form-control my-4">
                                                    <option value="">00:00</option>
                                                    <option value="7">07:00</option>
                                                    <option value="8">08:00</option>
                                                    <option value="9">09:00</option>
                                                    <option value="10">10:00</option>
                                                    <option value="11">11:00</option>
                                                    <option value="12">12:00</option>
                                                    <option value="13">13:00</option>
                                                    <option value="14">14:00</option>
                                                    <option value="15">15:00</option>
                                                    <option value="16">16:00</option>
                                                    <option value="17">17:00</option>
                                                    <option value="18">18:00</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <p>Hora Fin</p>
                                                <select name="lunesFinEditar" id="lunesFinEditar" class="form-control" disabled>
                                                    
                                                </select>
                                                <select name="martesFinEditar" id="martesFinEditar" class="form-control my-4" disabled>
                                                
                                                </select>
                                                <select name="miercolesFinEditar" id="miercolesFinEditar" class="form-control my-4" disabled>
                                                    
                                                </select>
                                                <select name="juevesFinEditar" id="juevesFinEditar" class="form-control my-4" disabled>
                                                    
                                                </select>
                                                <select name="viernesFinEditar" id="viernesFinEditar" class="form-control my-4" disabled>
                                                    
                                                </select>
                                                <input type="text" id="recuperarId" name="recuperarId" value="" hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-blue-card" id="btnEditarMateria">Asignar</button>
                    <button type="button" class="btn btn-red-card" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= SERVIDOR ?>controller/funciones_editar_horario.js"></script>