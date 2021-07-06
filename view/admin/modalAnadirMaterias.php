<!-- Modal Añadir-->
    <div class="modal fade" id="anadirMateriaModal" tabindex="-1" aria-labelledby="anadirMateriaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="anadirMateriaModalLabel"><b>Asignar Horario</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" method="post" id="frmAsignarHorario">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5><b>Elige la carrera</b></h5>
                                    <select name="" id="selectCarreraAnadir" class="form-control">
                                        <option value="">Selecciona una carrera</option>
                                        <option value="Gestion">Gestión</option>
                                        <option value="Industrial">Industrial</option>
                                        <option value="Sistemas">Sistemas</option>
                                    </select>
                                    <h5 class="py-3"><b>Elige la materia</b></h5>
                                    <select name="id_materia" id="selectMateriaAnadir" class="form-control" disabled>
                                        <option value="">Selecciona una materia</option>
                                    </select>
                                    <h5 class="py-3"><b>Elige el semestre</b></h5>
                                    <select name="" id="selectSemestreAnadir" class="form-control">
                                        <option value="">Selecciona un semestre</option>
                                    </select>
                                    <h5 class="py-3"><b>Elige el docente</b></h5>
                                    <select name="idDocente" id="selectDocenteAnadir" class="form-control">
                                        <option value="">Selecciona el docente</option>
                                    </select>
                                    <h5 class="py-3"><b>Elige el aula</b></h5>
                                    <select name="aula" id="selectAulaAnadir" class="form-control">
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
                                <div class="col-md-6">
                                    <h5><b>Horarios</b></h5>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="pt-5 pb-2">Lunes</p>
                                                <p class="py-3">Martes</p>
                                                <p class="pt-2 pb-3">Miercoles</p>
                                                <p class="py-2">Jueves</p>
                                                <p class="pt-3">Viernes</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>Hora Inicio</p>
                                                <select name="lunesInicio" id="lunesInicio" class="form-control">
                                                    <option value="0">00:00</option>
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
                                                <select name="martesInicio" id="martesInicio" class="form-control my-4">
                                                    <option value="0">00:00</option>
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
                                                <select name="miercolesInicio" id="miercolesInicio" class="form-control my-4">
                                                    <option value="0">00:00</option>
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
                                                <select name="juevesInicio" id="juevesInicio" class="form-control my-4">
                                                    <option value="0">00:00</option>
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
                                                <select name="viernesInicio" id="viernesInicio" class="form-control my-4">
                                                    <option value="0">00:00</option>
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
                                            <div class="col-md-4">
                                                <p>Hora Fin</p>
                                                <select name="lunesFin" id="lunesFin" class="form-control" disabled>
                                                    
                                                </select>
                                                <select name="martesFin" id="martesFin" class="form-control my-4" disabled>
                                                
                                                </select>
                                                <select name="miercolesFin" id="miercolesFin" class="form-control my-4" disabled>
                                                    
                                                </select>
                                                <select name="juevesFin" id="juevesFin" class="form-control my-4" disabled>
                                                    
                                                </select>
                                                <select name="viernesFin" id="viernesFin" class="form-control my-4" disabled>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-blue-card" id="btnAnadirMateria">Asignar</button>
                    <button type="button" class="btn btn-red-card" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>