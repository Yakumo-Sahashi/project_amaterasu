$(document).ready(function () {
    function mostrarTabla() {
        $('#tablaMaterias').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            ajax: './model/mostrarTablaHorarios.php',
            columns: [
                { data: "nombreMateria" },
                { data: "nombreDocente" },
                { data: "carrera" },
                { data: "semestre" },
                { data: "aula" },
                {
                    data: "idHorario",
                    render: function (idHorario, type, row) {
                        return '<span class="btn btn-warning btn-sm text-white borde-button" data-toggle="modal" data-target="#editarMateriaModal" onclick="mostrarDatosHorario('+ idHorario +')"><i class="fas fa-edit"></i></span>'
                    }
                }
            ]
        });

        return false;

    };

    mostrarTabla();
});