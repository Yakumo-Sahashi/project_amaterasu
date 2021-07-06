$(document).ready(function () {
    var obj;
    var aula;
    var carrera, horaInicio, horaFin;
    var materia, docente;
    var lunes = "00:00-00:00";
    var martes = "00:00-00:00";
    var miercoles = "00:00-00:00";
    var jueves = "00:00-00:00";
    var viernes = "00:00-00:00";


    function mostrarTabla() {
        $('#tablaMaterias').DataTable({
            language: {
                url: "http://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
            ajax: './model/mostrarMaterias.php',
            columns: [
                { data: "nombreMateria" },
                { data: "nombreDocente" },
                { data: "carrera" },
                { data: "semestre" },
                { data: "aula" },
                {
                    data: "editar",
                    render: function (data, type, row) {
                        return '<span class="btn btn-warning btn-sm text-white borde-button" data-toggle="modal" data-target="#editarMateriaModal"><i class="fas fa-edit"></i></span>'
                    }
                }
            ]
        });

        return false;

    };

    function selectCarreraAnadir() {
        $('#selectCarreraAnadir').bind('change', function () {
            carrera = $('#selectCarreraAnadir').val();
            if (carrera == "") {
                swal({
                    title: "Advertencia!",
                    text: "Elige una carrera por favor",
                    icon: "warning"
                });
                $('#selectMateriaAnadir').val('');
                $('#selectMateriaAnadir').attr("disabled", "");
                return false;

            } else {
                console.log(carrera);
                $('#selectMateriaAnadir').removeAttr("disabled");

                $.ajax({
                    type: "POST",
                    data: "carrera=" + carrera,
                    url: "./model/selectMaterias.php",
                    success: (r) => {
                        obj = JSON.parse(r);
                        console.log(obj);
                        for (i = 0; i < obj.data.length; i++) {

                            $('<option value="' + obj.data[i].idMateria + '">' + obj.data[i].nombreMateria + '</option>').appendTo('#selectMateriaAnadir');
                        }
                    }
                });
            };
            $('#selectMateriaAnadir').empty();
            $('<option value="">Selecciona una materia</option>').appendTo('#selectMateriaAnadir');
            return false;
        });

    };


    function selectSemestreAnadir() {
        $.ajax({
            type: "POST",
            url: "./model/selectSemestreMaterias.php",
            success: (r) => {
                obj = JSON.parse(r);

                $('<option value="' + obj.data[0].idSemestre + '">' + obj.data[0].semestre + '</option>').appendTo('#selectSemestreAnadir');
            }
        });
        return false;
    };



    function selectDocenteAnadir() {
        $.ajax({
            type: "POST",
            url: "./model/selectDocenteMaterias.php",
            success: (r) => {
                obj = JSON.parse(r);
                for (i = 0; i < obj.data.length; i++) {

                    $('<option value="' + obj.data[i].idDocentes + '">' + obj.data[i].nombreDocente + " " + obj.data[i].apellidoPaternoP + " " + obj.data[i].apellidoMaternoP + '</option>').appendTo('#selectDocenteAnadir');
                }

            }
        });
        return false;
    };

    function activarSelectHorarios() {
        $('#lunesInicio').bind('change', function () {
            $('#lunesFin').removeAttr("disabled");
            var inicio = $('#lunesInicio').val();
            selectHorarios(inicio, "lunesFin");
        });

        $('#martesInicio').bind('change', function () {
            $('#martesFin').removeAttr("disabled");
            var inicio = $('#martesInicio').val();
            selectHorarios(inicio, "martesFin");
        });

        $('#miercolesInicio').bind('change', function () {
            $('#miercolesFin').removeAttr("disabled");
            var inicio = $('#miercolesInicio').val();
            selectHorarios(inicio, "miercolesFin");
        });

        $('#juevesInicio').bind('change', function () {
            $('#juevesFin').removeAttr("disabled");
            var inicio = $('#juevesInicio').val();
            selectHorarios(inicio, "juevesFin");
        });

        $('#viernesInicio').bind('change', function () {
            $('#viernesFin').removeAttr("disabled");
            var inicio = $('#viernesInicio').val();
            selectHorarios(inicio, "viernesFin");
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
        if (options == 0) {
            $('#' + id).prop("disabled", "true");
        }
    };

    function validarDatos() {
        if ($('#selectCarreraAnadir').val() == "" && $('#selectMateriaAnadir').val() == "" && $('#selectSemestreAnadir').val() == "" && $('#selectDocenteAnadir').val() == "" && $('#selectAulaAnadir').val() == "") {
            swal({
                title: "Advertencia!",
                text: "No puedes dejar todos los campos vacios",
                icon: "warning"
            });
            return false;
        } else {
            if ($('#selectMateriaAnadir').val() == "") {
                swal({
                    title: "Advertencia!",
                    text: "Elige una materia por favor",
                    icon: "warning"
                });
                return false;
            } else if ($('#selectSemestreAnadir').val() == "") {
                swal({
                    title: "Advertencia!",
                    text: "Elige un semestre por favor",
                    icon: "warning"
                });
                return false;
            } else if ($('#selectDocenteAnadir').val() == "") {
                swal({
                    title: "Advertencia!",
                    text: "Elige un docente por favor",
                    icon: "warning"
                });
                return false;
            } else if ($('#selectAulaAnadir').val() == "") {
                swal({
                    title: "Advertencia!",
                    text: "Elige un aula por favor",
                    icon: "warning"
                });
                return false;
            } else if ($('#lunesInicio').val() == 0 && $('#martesInicio').val() == 0 && $('#miercolesInicio').val() == 0 && $('#juevesInicio').val() == 0 && $('#viernesInicio').val() == 0) {
                swal({
                    title: "Advertencia!",
                    text: "No puedes dejar todos los horarios vacios",
                    icon: "warning"
                });
                return false;
            } else {
                validarHorarios();
                return false;
            }
        }
    };

    function validarHorarios(){
        if($('#lunesInicio').val() == 0){
            lunes = "00:00-00:00";
        } else {
            if($('#lunesInicio').val() < 10){
                lunes = "0" + $('#lunesInicio').val() + ":00-" + $('#lunesFin').val();
            } else{
                lunes = $('#lunesInicio').val() + ":00-" + $('#lunesFin').val();
            }
            
        }
        
        if($('#martesInicio').val() == 0){
            martes = "00:00-00:00";
        } else {
            if($('#martesInicio').val() < 10){
                martes = "0" + $('#martesInicio').val() + ":00-" + $('#martesFin').val();
            } else{
                martes = $('#martesInicio').val() + ":00-" + $('#martesFin').val();
            }
            
        }

        if($('#miercolesInicio').val() == 0){
            miercoles = "00:00-00:00";
        } else {
            if($('#miercolesInicio').val() < 10){
                miercoles = "0" + $('#miercolesInicio').val() + ":00-" + $('#miercolesFin').val();
            } else{
                miercoles = $('#miercolesInicio').val() + ":00-" + $('#miercolesFin').val();
            }
            
        }

        if($('#juevesInicio').val() == 0){
            jueves = "00:00-00:00";
        } else {
            if($('#juevesInicio').val() < 10){
                jueves = "0" + $('#juevesInicio').val() + ":00-" + $('#juevesFin').val();
            } else{
                jueves = $('#juevesInicio').val() + ":00-" + $('#juevesFin').val();
            }
            
        }

        if($('#viernesInicio').val() == 0){
            viernes = "00:00-00:00";
        } else {
            if($('#viernesInicio').val() < 10){
                viernes = "0" + $('#viernesInicio').val() + ":00-" + $('#viernesFin').val();
            } else{
                viernes = $('#viernesInicio').val() + ":00-" + $('#viernesFin').val();
            }
            
        }
        anadirMateria(lunes, martes, miercoles , jueves, viernes);
    }

    function anadirMateria(lunes, martes, miercoles, jueves, viernes) {
        aula = $('#selectAulaAnadir').val();
        lunes = lunes;
        martes = martes;
        miercoles = miercoles;
        jueves = jueves;
        viernes = viernes;
        materia = $('#selectMateriaAnadir').val();
        docente = $('#selectDocenteAnadir').val();


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
                idDocente: docente
            },
            url: './model/anadirMateria.php',
            success: (r) => {
                console.log(r);
                if (r == "") {
                    swal({
                        title: "Error",
                        text: "Hubo un error al insertar los datos!",
                        icon: "error"
                    });
                } else {
                    swal({
                        title: "Exito",
                        text: "Los datos se guardaron correctamente",
                        icon: "success"
                    });
                    $('#tablaMaterias').DataTable().ajax.reload();
                    $('#frmAsignarHorario').trigger("reset");
                    $('#selectMateriaAnadir').attr("disabled", "");
                    selectHorarios();
                };

            }
        });

    };

    function editarMateria() {
        if ($('#lunes').val() == "" && $('#martes').val() == "" && $('#miercoles').val() == "" && $('#jueves').val() == "" && $('#viernes').val() == "") {
            swal({
                title: "Advertencia!",
                text: "No puedes dejar todos los horarios vacios",
                icon: "warning"
            });
            return false;
        } else {

        }
    };

    mostrarTabla();

    selectCarreraAnadir();

    selectSemestreAnadir();

    selectDocenteAnadir();

    activarSelectHorarios();

    /* validarHorario(); */

    $('#btnAnadirMateria').click(() => {
        validarDatos();
        

    });

    $('#btnEditarMateria').click(() => {
        editarMateria();
    })
});