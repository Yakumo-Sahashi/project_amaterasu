var edtHorario;
var aula, carrera, materia, docente;
var predeterminado = "00:00-00:00";

function mostrarDatosHorario(idHorario) {
    $.ajax({
        type: 'POST',
        data: "idHorario=" + idHorario,
        url: './model/mostrarDatosHorarios.php',
        success: (r) => {
            obj = JSON.parse(r);
            console.log(obj);
            $('#selectCarreraEditar').html('<option>' + obj.data[0].carrera + '</option>');
            $('#selectMateriaEditar').html('<option value="' + obj.data[0].id_materia + '">' + obj.data[0].nombreMateria + '</option>');
            $('#selectSemestreEditar').html('<option>' + obj.data[0].semestre + '</option>');
            $('#selectDocenteEditar').val(obj.data[0].idDocentes);
            $('#selectAulaEditar').val(obj.data[0].aula);
            $('#lunesActual').val(obj.data[0].lunes);
            $('#martesActual').val(obj.data[0].martes);
            $('#miercolesActual').val(obj.data[0].miercoles);
            $('#juevesActual').val(obj.data[0].jueves);
            $('#viernesActual').val(obj.data[0].viernes);
            $('#recuperarId').val(obj.data[0].idHorario);
        }
    });
};

function selectDocenteAnadir() {
    $.ajax({
        type: "POST",
        url: "./model/selectDocentesHorario.php",
        success: (r) => {
            obj = JSON.parse(r);
            for (i = 0; i < obj.data.length; i++) {

                $('<option value="' + obj.data[i].idDocentes + '">' + obj.data[i].nombreDocente + " " + obj.data[i].apellidoPaternoP + " " + obj.data[i].apellidoMaternoP + '</option>').appendTo('#selectDocenteEditar');
            }

        }
    });
    return false;
};

function activarSelectHorarios() {
    $('#lunesInicioEditar').bind('change', function () {
        $('#lunesFinEditar').removeAttr("disabled");
        var inicio = $('#lunesInicioEditar').val();
        selectHorarios(inicio, "lunesFinEditar");
    });

    $('#martesInicioEditar').bind('change', function () {
        $('#martesFinEditar').removeAttr("disabled");
        var inicio = $('#martesInicioEditar').val();
        selectHorarios(inicio, "martesFinEditar");
    });

    $('#miercolesInicioEditar').bind('change', function () {
        $('#miercolesFinEditar').removeAttr("disabled");
        var inicio = $('#miercolesInicioEditar').val();
        selectHorarios(inicio, "miercolesFinEditar");
    });

    $('#juevesInicioEditar').bind('change', function () {
        $('#juevesFinEditar').removeAttr("disabled");
        var inicio = $('#juevesInicioEditar').val();
        selectHorarios(inicio, "juevesFinEditar");
    });

    $('#viernesInicioEditar').bind('change', function () {
        $('#viernesFinEditar').removeAttr("disabled");
        var inicio = $('#viernesInicioEditar').val();
        selectHorarios(inicio, "viernesFinEditar");
    });
};


function selectHorarios(inicio, id) {
    inicio = parseInt(inicio) + 1;
    var options = '';
    for (var i = inicio; i < 20; i++) {

        if (i < 10) {
            options = options + '<option value="0' + i + ':00">0' + i + ':00</option>';
        } else {
            options = options + '<option value="' + i + ':00">' + i + ':00</option>';
        }
    } $('#' + id).html(options);
    if (options == "") {
        $('#' + id).prop("disabled", "true");
    }
};

function validarDatos() {
    if ($('#selectDocenteEditar').val() == "") {
        swal({
            title: "Advertencia!",
            text: "Elige un docente por favor",
            icon: "warning"
        });
        return false;
    } else if ($('#selectAulaEditar').val() == "") {
        swal({
            title: "Advertencia!",
            text: "Elige un aula por favor",
            icon: "warning"
        });
        return false;
    } else {
        validarHorarios();
        return false;
    }

};

function validarHorarios() {

    if ($('#lunesInicioEditar').val() == 0) {
        lunes = $('#lunesActual').val();
    } else {
        if ($('#lunesInicioEditar').val() < 10) {
            lunes = "0" + $('#lunesInicioEditar').val() + ":00-" + $('#lunesFinEditar').val();
        } else {
            lunes = $('#lunesInicioEditar').val() + ":00-" + $('#lunesFinEditar').val();
        }

    }

    if ($('#martesInicioEditar').val() == 0) {
        martes = $('#martesActual').val();
    } else {
        if ($('#martesInicioEditar').val() < 10) {
            martes = "0" + $('#martesInicioEditar').val() + ":00-" + $('#martesFinEditar').val();
        } else {
            martes = $('#martesInicioEditar').val() + ":00-" + $('#martesFinEditar').val();
        }

    }

    if ($('#miercolesInicioEditar').val() == 0) {
        miercoles = $('#miercolesActual').val();
    } else {
        if ($('#miercolesInicioEditar').val() < 10) {
            miercoles = "0" + $('#miercolesInicioEditar').val() + ":00-" + $('#miercolesFinEditar').val();
        } else {
            miercoles = $('#miercolesInicioEditar').val() + ":00-" + $('#miercolesFinEditar').val();
        }

    }

    if ($('#juevesInicioEditar').val() == 0) {
        jueves = $('#juevesActual').val();
    } else {
        if ($('#juevesInicioEditar').val() < 10) {
            jueves = "0" + $('#juevesInicioEditar').val() + ":00-" + $('#juevesFinEditar').val();
        } else {
            jueves = $('#juevesInicioEditar').val() + ":00-" + $('#juevesFinEditar').val();
        }

    }

    if ($('#viernesInicioEditar').val() == 0) {
        viernes = $('#viernesActual').val();
    } else {
        if ($('#viernesInicioEditar').val() < 10) {
            viernes = "0" + $('#viernesInicioEditar').val() + ":00-" + $('#viernesFinEditar').val();
        } else {
            viernes = $('#viernesInicioEditar').val() + ":00-" + $('#viernesFinEditar').val();
        }

    }
    editarMateria(lunes, martes, miercoles, jueves, viernes);
};

function editarMateria(lunes, martes, miercoles, jueves, viernes) {
    
    aula = $('#selectAulaEditar').val();
    lunes = lunes;
    martes = martes;
    miercoles = miercoles;
    jueves = jueves;
    viernes = viernes;
    materia = $('#selectMateriaEditar').val();
    docente = $('#selectDocenteEditar').val();
    edtHorario = $('#recuperarId').val();

    if(lunes == "00:00-00:00" && martes == "00:00-00:00" && miercoles == "00:00-00:00" && jueves == "00:00-00:00" && viernes == "00:00-00:00"){
        swal({
            title: "Advertencia!",
            text: "No puedes dejar todos los horarios vacios",
            icon: "warning"
        });
        return false;
    } else {
        $.ajax({
            type: 'POST',
            data: {
                aula: aula,
                lunes: lunes,
                martes: martes,
                miercoles: miercoles,
                jueves: jueves,
                viernes: viernes,
                id_materia: materia,
                idDocente: docente,
                idHorario: edtHorario
            },
            url: './model/editarHorarios.php',
            success: (r) => {
                console.log(r);
                
                if (r == "") {
                    swal({
                        title: "Error",
                        text: "Hubo un error al actualizar los datos!",
                        icon: "error"
                    });
                } else {
                    swal({
                        title: "Exito",
                        text: "Los datos se guardaron correctamente",
                        icon: "success"
                    });
                    $('#tablaMaterias').DataTable().ajax.reload();
                    $('#frmEditarHorario')[0].reset();
                    $('#lunesFinEditar').val("").attr("disabled", "");
                        $('#martesFinEditar').val("").attr("disabled", "");
                        $('#miercolesFinEditar').val("").attr("disabled", "");
                        $('#juevesFinEditar').val("").attr("disabled", "");
                        $('#viernesFinEditar').val("").attr("disabled", "");
                    $('#editarMateriaModal').modal('hide');
                    selectHorarios();
                };
    
            }
        });
    }

    

};


selectDocenteAnadir();

activarSelectHorarios();

$('#btnEliminarLunes').click(() => {
    $('#lunesActual').val(predeterminado);
});
$('#btnEliminarMartes').click(() => {
    $('#martesActual').val(predeterminado);
});
$('#btnEliminarMiercoles').click(() => {
    $('#miercolesActual').val(predeterminado);
});
$('#btnEliminarJueves').click(() => {
    $('#juevesActual').val(predeterminado);
});
$('#btnEliminarViernes').click(() => {
    $('#viernesActual').val(predeterminado);
});

$('#btnEditarMateria').click(() => {
    validarDatos();
});
