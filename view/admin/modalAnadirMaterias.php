<!-- Modal Añadir-->
    <div class="modal fade" id="anadirMateriaModal" tabindex="-1" aria-labelledby="anadirMateriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
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
                                <div class="col-md-8">
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
                                    <select name="" id="selectSemestreAnadir" class="form-control" disabled>
                                        <option value="">Selecciona un semestre</option>
                                    </select>
                                    <h5 class="py-3"><b>Elige el docente</b></h5>
                                    <select name="idDocente" id="selectDocenteAnadir" class="form-control" disabled>
                                        <option value="">Selecciona el docente</option>
                                    </select>
                                    <h5 class="py-3"><b>Elige el aula</b></h5>
                                    <select name="aula" id="selectAulaAnadir" class="form-control" disabled>
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
                                <div class="col-md-4">
                                    <h5><b>Horarios</b></h5>
                                    <label for="lunes">Lunes</label>
                                    <input type="text" placeholder="--:--" class="form-control form-control-sm" name="lunes" id="lunes">
                                    <label for="martes">Martes</label>
                                    <input type="text" placeholder="--:--" class="form-control form-control-sm" name="martes" id="martes">
                                    <label for="miercoles">Miercoles</label>
                                    <input type="text" placeholder="--:--" class="form-control form-control-sm" name="miercoles" id="miercoles">
                                    <label for="jueves">Jueves</label>
                                    <input type="text" placeholder="--:--" class="form-control form-control-sm" name="jueves" id="jueves">
                                    <label for="viernes">Viernes</label>
                                    <input type="text" placeholder="--:--" class="form-control form-control-sm" name="viernes" id="viernes">
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