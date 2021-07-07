$(document).ready(function (){
    var obj;
    var carrera;
    var idMateria;
    var semestre;
    var idDocentes;
    var datos;
    function mostrarTabla(){
        $('#tablaMaterias').DataTable({
            language: {
                url: "http://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
            ajax:'./model/mostrarMaterias.php',
            columns: [
                {data: "nombreMateria"},
                {data: "nombreDocente"},
                {data: "carrera"},
                {data: "semestre"},
                {data: "aula"},
                {data: "editar",
                    render: function(data, type, row){
                        return '<span class="btn btn-warning btn-sm text-white borde-button" data-toggle="modal" data-target="#editarMateriaModal"><i class="fas fa-edit"></i></span>'
                    }
                }
            ]
        });

        return false;

    };

    function selectCarreraAnadir(){
        $('#selectCarreraAnadir').bind('change', function(){
            carrera = $('#selectCarreraAnadir').val();
            if(carrera == ""){
                swal({
                    title: "Advertencia!",
                    text: "Elige una carrera por favor",
                    icon: "warning"
                });
                $('#selectMateriaAnadir').val('');
                $('#selectMateriaAnadir').attr("disabled","");
                return false;
                
            }else{
                console.log(carrera);
                $('#selectMateriaAnadir').removeAttr("disabled");
                
                $.ajax({
                    type: "POST",
                    data: "carrera=" + carrera,
                    url: "./model/selectMaterias.php",
                    success: (r)=>{
                        obj = JSON.parse(r);
                        console.log(obj);
                        for (i = 0; i < obj.data.length; i++) {
                    
                            $('<option value="'+ obj.data[i].idMateria + '">' + obj.data[i].nombreMateria + '</option>').appendTo('#selectMateriaAnadir');
                        }
                    }
                });
            };
            $('#selectMateriaAnadir').empty();
            $('<option value="">Selecciona una materia</option>').appendTo('#selectMateriaAnadir');
            return false;
        });
        
    };

    
    function selectSemestreAnadir(){
        $('#selectMateriaAnadir').bind('change', function(){
            idMateria = $('#selectMateriaAnadir').val();
            if(idMateria == ""){
                swal({
                    title: "Advertencia!",
                    text: "Elige una materia por favor",
                    icon: "warning"
                });
                $('#selectSemestreAnadir').val('');
                $('#selectSemestreAnadir').attr("disabled","");
                return false;
                
            }else{
                $('#selectSemestreAnadir').removeAttr("disabled");

                $.ajax({
                    type: "POST",
                    url: "./model/selectSemestreMaterias.php",
                    success: (r)=>{
                        obj = JSON.parse(r);
                        $('<option value="">' + obj.data[0].semestre + '</option>').appendTo('#selectSemestreAnadir');    
                    }
                });
            };
            $('#selectSemestreAnadir').empty();
            $('<option value="">Selecciona un semestre</option>').appendTo('#selectSemestreAnadir');
            return false;
        });
       
    };
    


    function selectDocenteAnadir(){
        $('#selectDocenteAnadir').bind('change', function(){
            semestre = $('#selectDocenteAnadir').val();
            if(semestre == ""){
                swal({
                    title: "Advertencia!",
                    text: "Elige una materia por favor",
                    icon: "warning"
                });
                $('#selectDocenteAnadir').val('');
                $('#selectDocenteAnadir').attr("disabled","");
                return false;
                
            }else{
                $('#selectDocenteAnadir').removeAttr("disabled");

                $.ajax({
                    type: "POST",
                    url: "./model/selectDocenteMaterias.php",
                    success: (r)=>{
                        obj = JSON.parse(r);
                        for (i = 0; i < obj.data.length; i++) {
                            
                            $('<option value="' + obj.data[i].idDocentes + '">' + obj.data[i].nombreDocente + " " + obj.data[i].apellidoPaternoP + " " + obj.data[i].apellidoMaternoP + '</option>').appendTo('#selectDocenteAnadir');
                        }
                        
                    }
                });
            };
            $('#selectDocenteAnadir').empty();
            $('<option value="">Selecciona el docente</option>').appendTo('#selectDocenteAnadir');
            return false;
        });
        
    };



    function anadirMateria(){
        if($('#selectCarreraAnadir').val() == "" && $('#selectMateriaAnadir').val() == "" && $('#selectSemestreAnadir').val() == "" && $('#selectDocenteAnadir').val() == "" && $('#selectAulaAnadir').val() == ""){
            swal({
                title: "Advertencia!",
                text: "No puedes dejar todos los campos vacios",
                icon: "warning"
            });
        }else{
            if($('#lunes').val() == "" && $('#martes').val() == "" && $('#miercoles').val() == "" && $('#jueves').val() == "" && $('#viernes').val() == ""){
                swal({
                    title: "Advertencia!",
                    text: "No puedes dejar todos los horarios vacios",
                    icon: "warning"
                });
                return false;
            }else {
                console.log(idMateria);
                idDocentes = $('#selectDocenteAnadir').val();
                console.log(idDocentes);
                datos = $('#frmAsignarHorario').serialize();
                console.log(datos);
                $.ajax({
                    type: 'POST',
                    data: $('#frmAsignarHorario').serialize(),
                    url: './model/anadirMateria.php',
                    success: (r)=>{
                        console.log(r);
                        if(r == ""){
                            swal({
                                title: "Error",
                                text: "Hubo un error al insertar los datos!",
                                icon: "error"
                            });
                        }else{
                            swal({
                                title: "Exito",
                                text: "Los datos se guardaron correctamente",
                                icon: "success"
                            });
                            $('#tablaMaterias').DataTable().ajax.reload();
                        }
                        
                    }
                });
                return false;
            }
        }

        
    };

    function editarMateria(){
        if($('#lunes').val() == "" && $('#martes').val() == "" && $('#miercoles').val() == "" && $('#jueves').val() == "" && $('#viernes').val() == ""){
            swal({
                title: "Advertencia!",
                text: "No puedes dejar todos los horarios vacios",
                icon: "warning"
            });
            return false;
        }else {

        }
    };

    mostrarTabla();

    selectCarreraAnadir();

    selectSemestreAnadir();

    selectDocenteAnadir();


    $('#btnAnadirMateria').click(()=>{
        anadirMateria();
    });

    $('#btnEditarMateria').click(()=>{
        editarMateria();
    })
});